<?php

namespace App\Http\Controllers;

use App\Models\Trek;
use App\Models\UserPreference;
use App\Models\UserTrekView;
use Illuminate\Http\Request;

class TrekController extends Controller
{
    public function showForm()
    {
        // Check if user is premium
    if (!auth()->user()->is_premium) {
        return redirect()->route('stripe')->with('error', 'Please pay to access recommendations.');
    }
        $userPreferences = auth()->check()
            ? UserPreference::where('user_id', auth()->id())->first()
            : null;

        return view('recommend.form', compact('userPreferences'));
    }

    public function processForm(Request $request)
    {
        $validated = $request->validate([
            'price_min' => 'required|numeric|min:1000',
            'price_max' => 'required|numeric|gte:price_min',
            'duration_days' => 'required|integer|min:1',
            'group_size' => 'required|string',
            'difficulty' => 'nullable|string',
            'accommodation' => 'nullable|string',
            'region' => 'nullable|string',
            'best_season' => 'nullable|string',
            'experience_level' => 'nullable|string',
            'interest_tags' => 'nullable|string',
        ]);

       $experienceToDifficultyMap = [
    'beginner' => ['easy'],
    'moderate' => ['moderate'],
    'advanced' => ['hard'],
];


        $userExpLevel = strtolower($validated['experience_level'] ?? '');

        $expectedDifficulties = $experienceToDifficultyMap[$userExpLevel] ?? [];

        if (auth()->check()) {
           $preference = UserPreference::updateOrCreate(
    ['user_id' => auth()->id()],
    [
        'budget' => $request->input('budget'),
        'available_days' => $request->input('available_days'),
        'region' => $request->input('region'),
        'difficulty' => $request->input('difficulty'),
        'experience_level' => $request->input('experience_level'), // ✅ Add this line
    ]
);
        }

        $interestArray = array_map('trim', explode(',', strtolower($validated['interest_tags'] ?? '')));

        // Perfect matches query
        $perfectMatches = Trek::query()
            ->whereBetween('price', [$validated['price_min'], $validated['price_max']])
            ->where('duration_days', '<=', $validated['duration_days'])
            ->whereRaw('LOWER(group_size) = ?', [strtolower($validated['group_size'])])
            ->when($validated['difficulty'] || $userExpLevel, function ($q) use ($validated, $expectedDifficulties, $userExpLevel) {
                if (!empty($validated['difficulty'])) {
                    $q->whereRaw('LOWER(difficulty) = ?', [strtolower($validated['difficulty'])]);
                } elseif (!empty($expectedDifficulties)) {
                    $q->whereIn('difficulty', $expectedDifficulties);
                }
            })
            ->when($validated['region'], fn($q) => $q->whereRaw('LOWER(region) = ?', [strtolower($validated['region'])]))
            ->when($validated['accommodation'], fn($q) => $q->whereRaw('LOWER(accommodation) = ?', [strtolower($validated['accommodation'])]))
            ->when($validated['best_season'], fn($q) => $q->whereRaw('LOWER(best_season) = ?', [strtolower($validated['best_season'])]))
            ->get()
            ->unique('name')
            ->groupBy('name');

        // Fallback matches with scoring
        $fallbackTreks = Trek::query()
            ->where('price', '<=', $validated['price_max'] + 5000)
            ->where('duration_days', '<=', $validated['duration_days'] + 3)
            ->get();

        $scoredTreks = $fallbackTreks->map(function ($trek) use ($validated, $interestArray, $expectedDifficulties, $userExpLevel) {
            $score = 0;
            $notes = [];

            if (!empty($validated['region']) && strtolower($trek->region) === strtolower($validated['region'])) {
                $score += 2;
            }

            if (!empty($validated['difficulty']) || !empty($userExpLevel)) {
                $matchesDifficulty = false;

                if (!empty($validated['difficulty']) && strtolower($trek->difficulty) === strtolower($validated['difficulty'])) {
                    $matchesDifficulty = true;
                } elseif (!empty($expectedDifficulties) && in_array(strtolower($trek->difficulty), $expectedDifficulties)) {
                    $matchesDifficulty = true;
                }

                if ($matchesDifficulty) {
                    $score += 2;
                } else {
                    $notes[] = "Selected difficulty/experience level does not match trek difficulty '{$trek->difficulty}'.";
                }
            }

            if (!empty($validated['best_season']) && strtolower($trek->best_season) === strtolower($validated['best_season'])) {
                $score += 1;
            }

            if (!empty($validated['accommodation']) && strtolower($trek->accommodation) === strtolower($validated['accommodation'])) {
                $score += 1;
            }

            if (strtolower($trek->group_size) === strtolower($validated['group_size'])) {
                $score += 1;
            }

            if (!empty($validated['experience_level']) && !empty($trek->experience_level)) {
                if (strtolower($trek->experience_level) === strtolower($validated['experience_level'])) {
                    $score += 2;
                } else {
                    $notes[] = "This trek is for {$trek->experience_level} trekkers, but you selected {$validated['experience_level']}.";
                }
            }

            if (!empty($interestArray)) {
                $matchedCount = 0;

                foreach ($interestArray as $interest) {
                    if (
                        stripos($trek->description ?? '', $interest) !== false ||
                        stripos($trek->name ?? '', $interest) !== false
                    ) {
                        $matchedCount++;
                    }
                }

                if ($matchedCount > 0) {
                    $score += min(3, $matchedCount);
                } else {
                    $notes[] = "Your interests like " . implode(', ', $interestArray) . " may not match this trek.";
                }
            }

            return [
                'trek' => $trek,
                'score' => $score,
                'notes' => $notes,
            ];
        });

        $groupedFallback = $scoredTreks
            ->sortByDesc('score')
            ->groupBy(fn ($item) => $item['trek']->name)
            ->map(function ($items) {
                $trek = $items->first()['trek'];
                $prices = ['solo' => null, 'couple' => null, 'group' => null];

                foreach ($items as $item) {
                    $size = strtolower($item['trek']->group_size);
                    if (in_array($size, ['solo', 'couple', 'group'])) {
                        $prices[$size] = $item['trek']->price;
                    }
                }

                return [
                    'trek' => $trek,
                    'prices' => $prices,
                    'score' => $items->max('score'),
                    'notes' => $items->flatMap(fn ($item) => $item['notes'])->unique()->values(),
                ];
            });

        // "Because You Liked..." recommendations
        $relatedTreksRaw = Trek::query()
            ->where('visibility', 'public')
            ->when($validated['region'], fn ($q) => $q->orWhere('region', $validated['region']))
            ->when($validated['difficulty'], fn ($q) => $q->orWhere('difficulty', $validated['difficulty']))
            ->when($validated['experience_level'], fn ($q) => $q->orWhere('experience_level', $validated['experience_level']))
            ->where('price', '>=', $validated['price_min'] - 10000)
            ->where('price', '<=', $validated['price_max'] + 10000)
            ->whereNotIn('name', $perfectMatches->keys())
            ->get();

        $relatedTreks = $relatedTreksRaw
            ->groupBy('name')
            ->map(function ($items) {
                $trek = $items->first();
                $prices = ['solo' => null, 'couple' => null, 'group' => null];

                foreach ($items as $item) {
                    $size = strtolower($item->group_size);
                    if (in_array($size, ['solo', 'couple', 'group'])) {
                        $prices[$size] = $item->price;
                    }
                }

                return [
                    'trek' => $trek,
                    'prices' => $prices,
                ];
            })
            ->take(3);

    // If perfect match found, return immediately
    if ($perfectMatches->isNotEmpty()) {
        return view('recommend.results', [
            'recommendedTreks' => $perfectMatches,
            'otherTreks' => $groupedFallback,
            'relatedTreks' => $relatedTreks,
        ]);
    }

    /**
     * Show single trek detail and track user views
     */

    {
        \Log::info('Saving trek view', ['user_id' => auth()->id(), 'trek_id' => $trek->id]);

        // Load trek with itineraries or 404
        $trek = Trek::with('itineraries')->findOrFail($id);

        // Track user view if logged in
        if (auth()->check()) {
    try {
        UserTrekView::updateOrCreate(
            ['user_id' => auth()->id(), 'trek_id' => $trek->id],
            ['viewed_at' => now()]
        );
    } catch (\Exception $e) {
        \Log::error('Failed to save user trek view: ' . $e->getMessage());
        // Optionally continue silently or notify admin later
    }
}


        // Content-based recommendations based on recent views
        $recommendations = collect();
        if (auth()->check()) {
            $recentViewedIds = UserTrekView::where('user_id', auth()->id())
                ->orderByDesc('viewed_at')
                ->limit(3)
                ->pluck('trek_id');

            $viewedTreks = Trek::whereIn('id', $recentViewedIds)->get();

            $recommendations = Trek::whereNotIn('id', $recentViewedIds)
                ->where(function ($query) use ($viewedTreks) {
                    foreach ($viewedTreks as $vt) {
                        $query->orWhere('region', $vt->region)
                              ->orWhere('difficulty', $vt->difficulty);
                    }
                })
                ->limit(5)
                ->get();
        }

        // Preference-based recommendations
        $preferenceRecommendations = collect();
        if (auth()->check()) {
            $pref = UserPreference::where('user_id', auth()->id())->first();
            if ($pref) {
                $preferenceRecommendations = Trek::where('price', '<=', $pref->budget)
                    ->where('duration_days', '<=', $pref->available_days)
                    ->limit(5)
                    ->get();
            }
        }

        return view('itinerary.show', compact('trek', 'recommendations', 'preferenceRecommendations'));
    }
}




// Score fallback results


// Sort by score descending


// Group by trek name

// Aggregate prices per group_size inside each trek group


    // Prepare prices container

}

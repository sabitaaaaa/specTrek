<?php

namespace App\Http\Controllers;

use App\Models\Trek;
use App\Models\UserPreference;
use App\Models\UserTrekView;
use Illuminate\Http\Request;

class TrekController extends Controller
{

    // Show the trek recommendation form to the user
    public function showForm()
    {
        // Check if the authenticated user is premium, otherwise redirect to payment page
        if (!auth()->user()->is_premium) {
            return redirect()->route('stripe')->with('error', 'Please pay to access recommendations.');
        }

        // Retrieve user's previously saved preferences (if logged in)
        $userPreferences = auth()->check()
            ? UserPreference::where('user_id', auth()->id())->first()
            : null;

        // Return the form view, passing the user preferences for pre-filling form inputs
        return view('recommend.form', compact('userPreferences'));
    }

    // Process the submitted recommendation form and show trek results
    public function processForm(Request $request)
    {
        // Validate the incoming request form data with rules
        $validated = $request->validate([
            'price_min' => 'required|numeric|min:1000',                 // minimum price must be number >= 1000
            'price_max' => 'required|numeric|gte:price_min',           // max price must be >= min price
            'duration_days' => 'required|integer|min:1',               // trek duration in days, minimum 1
            'group_size' => 'required|string',                         // group size is required (solo, couple, group)
            'difficulty' => 'nullable|string',                         // optional difficulty level
            'accommodation' => 'nullable|string',                      // optional accommodation type
            'region' => 'nullable|string',                             // optional trek region
            'best_season' => 'nullable|string',                        // optional preferred season
            'experience_level' => 'nullable|string',                   // optional user's trekking experience
            'interest_tags' => 'nullable|string',                      // optional comma-separated interests
        ]);

        // Map user's experience level to corresponding difficulty levels for matching
        $experienceToDifficultyMap = [
            'beginner' => ['easy'],
            'moderate' => ['moderate'],
            'advanced' => ['hard'],
        ];

        // Get user's experience level from form input (lowercase for comparison)
        $userExpLevel = strtolower($validated['experience_level'] ?? '');

        // Get array of difficulty levels that match the user's experience level
        $expectedDifficulties = $experienceToDifficultyMap[$userExpLevel] ?? [];

        // If user is logged in, save/update their preferences in database
        if (auth()->check()) {
            $preference = UserPreference::updateOrCreate(
                ['user_id' => auth()->id()],  // find by user_id
                [
                    'budget' => $request->input('budget'),                  // save budget (max price)
                    'available_days' => $request->input('available_days'),  // save days available
                    'region' => $request->input('region'),                  // save preferred region
                    'difficulty' => $request->input('difficulty'),          // save difficulty
                    'experience_level' => $request->input('experience_level'),  // save experience level
                ]
            );
        }

        // Convert user's interest tags string into an array of trimmed lowercase strings
        $interestArray = array_map('trim', explode(',', strtolower($validated['interest_tags'] ?? '')));

        // Build query for "perfect matches" - strict filtering based on user's criteria
        $perfectMatches = Trek::query()
            ->whereBetween('price', [$validated['price_min'], $validated['price_max']])    // price between min and max
            ->where('duration_days', '<=', $validated['duration_days'])                   // duration less than or equal to max days
            ->whereRaw('LOWER(group_size) = ?', [strtolower($validated['group_size'])])   // exact group size match (case-insensitive)
            ->when($validated['difficulty'] || $userExpLevel, function ($q) use ($validated, $expectedDifficulties, $userExpLevel) {
                if (!empty($validated['difficulty'])) {
                    // Filter by exact difficulty if provided
                    $q->whereRaw('LOWER(difficulty) = ?', [strtolower($validated['difficulty'])]);
                } elseif (!empty($expectedDifficulties)) {
                    // Otherwise filter by difficulties matching experience level
                    $q->whereIn('difficulty', $expectedDifficulties);
                }
            })
            ->when($validated['region'], fn($q) => $q->whereRaw('LOWER(region) = ?', [strtolower($validated['region'])]))          // filter by region
            ->when($validated['accommodation'], fn($q) => $q->whereRaw('LOWER(accommodation) = ?', [strtolower($validated['accommodation'])]))  // accommodation
            ->when($validated['best_season'], fn($q) => $q->whereRaw('LOWER(best_season) = ?', [strtolower($validated['best_season'])]))           // season
            ->get()
            ->unique('name')          // remove duplicates by trek name
            ->groupBy('name');        // group results by trek name

        // Query for fallback matches with relaxed criteria
        $fallbackTreks = Trek::query()
            ->where('price', '<=', $validated['price_max'] + 5000)                // price within 5000 over max
            ->where('duration_days', '<=', $validated['duration_days'] + 3)       // duration up to 3 days longer
            ->get();

        // Score fallback treks by how well they match criteria
        $scoredTreks = $fallbackTreks->map(function ($trek) use ($validated, $interestArray, $expectedDifficulties, $userExpLevel) {
            $score = 0;
            $notes = [];

            // Add score if region matches
            if (!empty($validated['region']) && strtolower($trek->region) === strtolower($validated['region'])) {
                $score += 2;
            }

            // Check difficulty match or experience match
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
                    // Add a note if difficulty doesn't match
                    $notes[] = "Selected difficulty/experience level does not match trek difficulty '{$trek->difficulty}'.";
                }
            }

            // Add score if season matches
            if (!empty($validated['best_season']) && strtolower($trek->best_season) === strtolower($validated['best_season'])) {
                $score += 1;
            }

            // Add score if accommodation matches
            if (!empty($validated['accommodation']) && strtolower($trek->accommodation) === strtolower($validated['accommodation'])) {
                $score += 1;
            }

            // Add score if group size matches
            if (strtolower($trek->group_size) === strtolower($validated['group_size'])) {
                $score += 1;
            }

            // Check experience level match note
            if (!empty($validated['experience_level']) && !empty($trek->experience_level)) {
                if (strtolower($trek->experience_level) === strtolower($validated['experience_level'])) {
                    $score += 2;
                } else {
                    $notes[] = "This trek is for {$trek->experience_level} trekkers, but you selected {$validated['experience_level']}.";
                }
            }

            // Check if trek description or name contains user's interests
            if (!empty($interestArray)) {
                $matchedCount = 0;

                foreach ($interestArray as $interest) {
                    if (
                        stripos($trek->description ?? '', $interest) !== false ||   // search in description
                        stripos($trek->name ?? '', $interest) !== false              // search in name
                    ) {
                        $matchedCount++;
                    }
                }

                // Add score based on number of matches, max 3
                if ($matchedCount > 0) {
                    $score += min(3, $matchedCount);
                } else {
                    $notes[] = "Your interests like " . implode(', ', $interestArray) . " may not match this trek.";
                }
            }

            // Return trek, its score, and any notes
            return [
                'trek' => $trek,
                'score' => $score,
                'notes' => $notes,
            ];
        });

        // Group fallback treks by name and aggregate prices by group size
        $groupedFallback = $scoredTreks
            ->sortByDesc('score')               // sort by score descending
            ->groupBy(fn ($item) => $item['trek']->name)     // group by trek name
            ->map(function ($items) {
                $trek = $items->first()['trek'];             // first trek in group
                $prices = ['solo' => null, 'couple' => null, 'group' => null];

                // Aggregate prices for different group sizes in the group
                foreach ($items as $item) {
                    $size = strtolower($item['trek']->group_size);
                    if (in_array($size, ['solo', 'couple', 'group'])) {
                        $prices[$size] = $item['trek']->price;
                    }
                }

                return [
                    'trek' => $trek,
                    'prices' => $prices,
                    'score' => $items->max('score'),      // highest score in group
                    'notes' => $items->flatMap(fn ($item) => $item['notes'])->unique()->values(),  // all unique notes
                ];
            });

        // "Because You Liked..." - related trek recommendations query
        $relatedTreksRaw = Trek::query()
            ->where('visibility', 'public')           // only public treks
            ->when($validated['region'], fn ($q) => $q->orWhere('region', $validated['region']))
            ->when($validated['difficulty'], fn ($q) => $q->orWhere('difficulty', $validated['difficulty']))
            ->when($validated['experience_level'], fn ($q) => $q->orWhere('experience_level', $validated['experience_level']))
            ->where('price', '>=', $validated['price_min'] - 10000)  // within price range (with margin)
            ->where('price', '<=', $validated['price_max'] + 10000)
            ->whereNotIn('name', $perfectMatches->keys())             // exclude already recommended treks
            ->get();

        // Group related treks by name and prepare price map
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
            ->take(3);   // limit to 3 related treks

        // Return the results view with perfect matches, fallback matches, and related treks
        return view('recommend.results', [
            'recommendedTreks' => $perfectMatches,    // strict matches
            'otherTreks' => $groupedFallback,         // fallback scored matches
            'relatedTreks' => $relatedTreks,          // "Because you liked..." suggestions
        ]);
    }

    /**
     * Show single trek detail and track user views
     */
    public function show($id)
    {
        // Log user and trek ID for debugging when saving views
        \Log::info('Saving trek view', ['user_id' => auth()->id(), 'trek_id' => $id]);

        // Load trek with related itinerary data or fail with 404
        $trek = Trek::with('itineraries')->findOrFail($id);

        // If user is logged in, record that they viewed this trek
        if (auth()->check()) {
            try {
                UserTrekView::updateOrCreate(
                    ['user_id' => auth()->id(), 'trek_id' => $trek->id],  // find or create record
                    ['viewed_at' => now()]                                // update viewed time
                );
            } catch (\Exception $e) {
                // Log error if unable to save view, but don't crash app
                \Log::error('Failed to save user trek view: ' . $e->getMessage());
            }
        }

        // Content-based recommendations based on user's recent trek views
        $recommendations = collect();

        if (auth()->check()) {
            // Get IDs of last 3 treks user viewed
            $recentViewedIds = UserTrekView::where('user_id', auth()->id())
                ->orderByDesc('viewed_at')
                ->limit(3)
                ->pluck('trek_id');

            // Get those treks from DB
            $viewedTreks = Trek::whereIn('id', $recentViewedIds)->get();

            // Find other treks matching region or difficulty of recently viewed treks, exclude already viewed
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

        // Additional recommendations based on user's saved preferences
        $preferenceRecommendations = collect();

        if (auth()->check()) {
            $pref = UserPreference::where('user_id', auth()->id())->first();
            if ($pref) {
                // Find treks that fit within user's budget and available days
                $preferenceRecommendations = Trek::where('price', '<=', $pref->budget)
                    ->where('duration_days', '<=', $pref->available_days)
                    ->limit(5)
                    ->get();
            }
        }

        // Return the trek detail page with trek data and recommendations
        return view('itinerary.show', compact('trek', 'recommendations', 'preferenceRecommendations'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Trek;
use App\Models\UserPreference;
use Illuminate\Http\Request;

class TrekController extends Controller
{
    public function showForm()
    {
        $userPreferences = auth()->check()
            ? UserPreference::where('user_id', auth()->id())->first()
            : null;

        return view('recommend.form', compact('userPreferences'));
    }

    public function processForm(Request $request)
    {
        // ✅ Step 1: Validation
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

        // ✅ Step 2: Save preferences if logged in
        if (auth()->check()) {
            UserPreference::updateOrCreate(
                ['user_id' => auth()->id()],
                [
                    'budget' => $validated['price_max'],
                    'available_days' => $validated['duration_days'],
                    'difficulty_pref' => $validated['difficulty'] ?? null,
                    'interest_tags' => $validated['region'] ?? null,
                    'season_pref' => $validated['best_season'] ?? null,
                    'experience_level' => $validated['experience_level'] ?? null,
                    'interest_tags' => $validated['interest_tags'] ?? null,

                ]
            );
        }
        $interestArray = array_map('trim', explode(',', strtolower($validated['interest_tags'] ?? '')));


        // ✅ Step 3: Strict Matches - Only exact matching treks
        $perfectMatches = Trek::query()
            ->whereBetween('price', [$validated['price_min'], $validated['price_max']])
            ->where('duration_days', '<=', $validated['duration_days'])
            ->whereRaw('LOWER(group_size) = ?', [strtolower($validated['group_size'])])
            ->when($validated['difficulty'], fn($q) => $q->whereRaw('LOWER(difficulty) = ?', [strtolower($validated['difficulty'])]))
            ->when($validated['region'], fn($q) => $q->whereRaw('LOWER(region) = ?', [strtolower($validated['region'])]))
            ->when($validated['accommodation'], fn($q) => $q->whereRaw('LOWER(accommodation) = ?', [strtolower($validated['accommodation'])]))
            ->when($validated['best_season'], fn($q) => $q->whereRaw('LOWER(best_season) = ?', [strtolower($validated['best_season'])]))
            ->get()
            ->unique('name')
            ->groupBy('name');

        // ✅ Step 4: Fallback Matches - If strict fails or additional options
        $fallbackTreks = Trek::query()
            ->where('price', '<=', $validated['price_max'] + 5000)
            ->where('duration_days', '<=', $validated['duration_days'] + 3)
            ->get();

        $scoredTreks = $fallbackTreks->map(function ($trek) use ($validated) {
            $score = 0;
            $notes = [];

            // Region
            if (!empty($validated['region']) && strtolower($trek->region) === strtolower($validated['region'])) {
                $score += 2;
            }

            // Difficulty
            if (!empty($validated['difficulty'])) {
                if (strtolower($trek->difficulty) === strtolower($validated['difficulty'])) {
                    $score += 2;
                } else {
                    $notes[] = "You selected '{$validated['difficulty']}' difficulty, but this trek is '{$trek->difficulty}'.";
                }
            }

            // Season
            if (!empty($validated['best_season']) && strtolower($trek->best_season) === strtolower($validated['best_season'])) {
                $score += 1;
            }

            // Accommodation
            if (!empty($validated['accommodation']) && strtolower($trek->accommodation) === strtolower($validated['accommodation'])) {
                $score += 1;
            }

            // Group size
            if (strtolower($trek->group_size) === strtolower($validated['group_size'])) {
                $score += 1;
            }

            return [
                'trek' => $trek,
                'score' => $score,
                'notes' => $notes,
            ];
        });

        // ✅ Step 5: Group fallback treks by name
        $groupedFallback = $scoredTreks
            ->sortByDesc('score')
            ->groupBy(fn($item) => $item['trek']->name)
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
                    'notes' => $items->flatMap(fn($item) => $item['notes'])->unique()->values(),
                ];
            });

        // ✅ Step 6: Return results to view
        return view('recommend.results', [
            'recommendedTreks' => $perfectMatches,
            'otherTreks' => $groupedFallback,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Trek;
use App\Models\UserPreference;
use Illuminate\Http\Request;

class TrekController extends Controller
{
    public function showForm()
    {
        $userPreferences = null;
        if (auth()->check()) {
            $userPreferences = UserPreference::where('user_id', auth()->id())->first();
        }
        return view('recommend.form', compact('userPreferences'));
    }

    public function processForm(Request $request)
    {
        // ✅ STEP 1: Validate required fields
        $request->validate([
            'price_min' => 'required|integer|min:0',
            'price_max' => 'required|integer|min:0|gte:price_min',
            'duration_days' => 'required|integer|min:1',
        ]);

        // ✅ STEP 2: Save user preferences (optional)
        if (auth()->check()) {
            UserPreference::updateOrCreate(
                ['user_id' => auth()->id()],
                [
                    'budget' => $request->price_max,
                    'available_days' => $request->duration_days,
                    'difficulty_pref' => $request->difficulty,
                    'interest_tags' => $request->region,
                    'season_pref' => $request->best_season,
                    'expectation_notes' => $request->expectation_notes ?? null,
                ]
            );
        }

        // ✅ STEP 3: Build strict (perfect match) query using ->when()
        $strictQuery = Trek::query()
            ->when($request->filled('price_min') && $request->filled('price_max'), fn($q) =>
                $q->whereBetween('price', [$request->price_min, $request->price_max]))
            ->when($request->filled('duration_days'), fn($q) =>
                $q->where('duration_days', '<=', $request->duration_days))
            ->when($request->filled('best_season'), fn($q) =>
                $q->whereRaw('LOWER(best_season) = ?', [strtolower($request->best_season)]))
            ->when($request->filled('difficulty'), fn($q) =>
                $q->whereRaw('LOWER(difficulty) = ?', [strtolower($request->difficulty)]))
            ->when($request->filled('region'), fn($q) =>
                $q->whereRaw('LOWER(region) = ?', [strtolower($request->region)]))
            ->when($request->filled('group_size'), fn($q) =>
                $q->whereRaw('LOWER(group_size) = ?', [strtolower($request->group_size)]));

        $perfectMatches = $strictQuery->get()->groupBy('name');

        // ✅ STEP 4: If perfect matches exist, return early
        if ($perfectMatches->isNotEmpty()) {
            return view('recommend.results', [
                'recommendedTreks' => $perfectMatches,
                'otherTreks' => collect(),
            ]);
        }

        // ✅ STEP 5: Fallback logic (loosen filters)
        $fallbackQuery = Trek::query()
            ->when($request->filled('price_max'), fn($q) =>
                $q->where('price', '<=', $request->price_max + 5000))
            ->when($request->filled('duration_days'), fn($q) =>
                $q->where('duration_days', '<=', $request->duration_days + 3));

        $fallbackTreks = $fallbackQuery->get();

        // ✅ STEP 6: Score fallback results
        $scoredTreks = $fallbackTreks->map(function ($trek) use ($request) {
            $score = 0;
            if ($request->filled('region') && strtolower($trek->region) === strtolower($request->region)) $score += 2;
            if ($request->filled('difficulty') && strtolower($trek->difficulty) === strtolower($request->difficulty)) $score += 2;
            if ($request->filled('best_season') && strtolower($trek->best_season) === strtolower($request->best_season)) $score += 1;
            if ($request->filled('accommodation') && strtolower($trek->accommodation) === strtolower($request->accommodation)) $score += 1;
            if ($request->filled('group_size') && strtolower($trek->group_size) === strtolower($request->group_size)) $score += 1;

            return ['trek' => $trek, 'score' => $score];
        });

        // ✅ STEP 7: Sort fallback results by score
        $sortedFallback = $scoredTreks->sortByDesc('score');

        // ✅ STEP 8: Group similar fallback treks by name
        $grouped = $sortedFallback->groupBy(fn($item) => $item['trek']->name);

        // ✅ STEP 9: Prepare prices by group size
        $groupedFallback = $grouped->map(function ($items, $trekName) {
            $firstTrek = $items->first()['trek'];

            $prices = ['solo' => null, 'couple' => null, 'group' => null];
            foreach ($items as $item) {
                $groupSize = strtolower($item['trek']->group_size ?? '');
                if (in_array($groupSize, ['solo', 'couple', 'group'])) {
                    $prices[$groupSize] = $item['trek']->price;
                }
            }

            return [
                'trek' => $firstTrek,
                'prices' => $prices,
                'score' => $items->max('score'),
            ];
        });

        // ✅ STEP 10: Return fallback results view
        return view('recommend.results', [
            'recommendedTreks' => collect(), // no perfect matches
            'otherTreks' => $groupedFallback,
        ]);
    }
}

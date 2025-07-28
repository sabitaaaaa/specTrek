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
    // Step 0: Save user preferences
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

    // Step 1: Perfect Match (Strict Query)
    $strictQuery = Trek::query();

    if ($request->filled('price_min') && $request->filled('price_max')) {
        $strictQuery->whereBetween('price', [$request->price_min, $request->price_max]);
    }
    if ($request->filled('duration_days')) {
        $strictQuery->where('duration_days', '<=', $request->duration_days);
    }
    if ($request->filled('best_season')) {
        $strictQuery->whereRaw('LOWER(best_season) = ?', [strtolower($request->best_season)]);
    }
    if ($request->filled('difficulty')) {
        $strictQuery->whereRaw('LOWER(difficulty) = ?', [strtolower($request->difficulty)]);
    }
    if ($request->filled('region')) {
        $strictQuery->whereRaw('LOWER(region) = ?', [strtolower($request->region)]);
    }
    if ($request->filled('group_size')) {
        $strictQuery->whereRaw('LOWER(group_size) = ?', [strtolower($request->group_size)]);
    }

    $perfectMatches = $strictQuery->get()->groupBy('name');

    // If perfect match found, return immediately
    if ($perfectMatches->isNotEmpty()) {
        return view('recommend.results', [
            'recommendedTreks' => $perfectMatches,
            'otherTreks' => collect(), // No need for fallback
        ]);
    }

    // Step 2: Fallback Logic (adjusted)
$fallbackQuery = Trek::query();

// Loosened price and duration
if ($request->filled('price_max')) {
    $fallbackQuery->where('price', '<=', $request->price_max + 5000);
}
if ($request->filled('duration_days')) {
    $fallbackQuery->where('duration_days', '<=', $request->duration_days + 3);
}

$fallbackTreks = $fallbackQuery->get();

// Score fallback results
$scoredTreks = $fallbackTreks->map(function ($trek) use ($request) {
    $score = 0;
    if ($request->filled('region') && strtolower($trek->region) === strtolower($request->region)) $score += 2;
    if ($request->filled('difficulty') && strtolower($trek->difficulty) === strtolower($request->difficulty)) $score += 2;
    if ($request->filled('best_season') && strtolower($trek->best_season) === strtolower($request->best_season)) $score += 1;
    if ($request->filled('accommodation') && strtolower($trek->accommodation) === strtolower($request->accommodation)) $score += 1;
    if ($request->filled('group_size') && strtolower($trek->group_size) === strtolower($request->group_size)) $score += 1;

    return ['trek' => $trek, 'score' => $score];
});

// Sort by score descending
$sortedFallback = $scoredTreks->sortByDesc('score');

// Group by trek name
$grouped = $sortedFallback->groupBy(fn($item) => $item['trek']->name);

// Aggregate prices per group_size inside each trek group
$groupedFallback = $grouped->map(function ($items, $trekName) {
    $firstTrek = $items->first()['trek'];

    // Prepare prices container
    $prices = [
        'solo' => null,
        'couple' => null,
        'group' => null,
    ];

    foreach ($items as $item) {
        $trek = $item['trek'];
        $groupSize = strtolower($trek->group_size ?? '');
        if (in_array($groupSize, ['solo', 'couple', 'group'])) {
            $prices[$groupSize] = $trek->price;
        }
    }

    return [
        'trek' => $firstTrek,
        'prices' => $prices,
        'score' => $items->max('score'),
    ];
});

return view('recommend.results', [
    'recommendedTreks' => collect(), // no perfect match in fallback
    'otherTreks' => $groupedFallback,
]);

}

}
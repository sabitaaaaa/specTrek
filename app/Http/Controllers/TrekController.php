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
        if (auth()->check()) {
            UserPreference::updateOrCreate(
                ['user_id' => auth()->id()],
                [
                    'budget' => $request->price_max,
                    'available_days' => $request->duration_days,
                    'difficulty_pref' => $request->difficulty,
                    'interest_tags' => $request->region,
                    'season_pref' => $request->best_season,
                    'expectation_notes' => null,
                ]
            );
        }

        // Strict query with all filters
        $strictQuery = Trek::query();

        if ($request->filled('price_min') && $request->filled('price_max')) {
            $strictQuery->whereBetween('price', [$request->price_min, $request->price_max]);
        }
        if ($request->filled('duration_days')) {
            $strictQuery->where('duration_days', '<=', $request->duration_days);
        }
        if ($request->filled('best_season')) {
            $strictQuery->where('best_season', $request->best_season);
        }
        if ($request->filled('difficulty')) {
            $strictQuery->where('difficulty', $request->difficulty);
        }
        if ($request->filled('region')) {
            $strictQuery->where('region', $request->region);
        }
        if ($request->filled('group_size')) {
            $strictQuery->where('group_size', $request->group_size);
        }
        if ($request->filled('accommodation')) {
            $strictQuery->where('accommodation', $request->accommodation);
        }

        $recommendedTreks = $strictQuery->get();

        // Fallback query
        $fallbackQuery = Trek::query();
        if ($request->filled('price_max')) {
            $fallbackQuery->where('price', '<=', $request->price_max);
        }
        if ($recommendedTreks->isNotEmpty()) {
            $fallbackQuery->whereNotIn('id', $recommendedTreks->pluck('id'));
        }
        $otherTreks = $fallbackQuery->get();

        return view('recommend.results', [
            'recommendedTreks' => $recommendedTreks->groupBy('name'),
            'otherTreks' => $otherTreks->groupBy('name'),
        ]);
    }
}

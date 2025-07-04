<?php

namespace App\Http\Controllers;

use App\Models\Trek;
use App\Models\UserPreference;
use Illuminate\Http\Request;

class TrekController extends Controller
{
    public function showForm()
    {
        return view('recommend.form');
    }

    public function processForm(Request $request)
    {
        // Save user preferences
        UserPreference::create([
            'user_id' => auth()->check() ? auth()->id() : null,
            'budget' => $request->price_max ?? 0,
            'available_days' => $request->duration_days ?? 0,
            'difficulty_pref' => $request->difficulty,
            'interest_tags' => $request->region,
            'season_pref' => $request->best_season,
            'expectation_notes' => null,
        ]);

        // Build query with filters
        $query = Trek::query();

        if ($request->filled('price_min')) {
            $query->where('price', '>=', $request->price_min);
        }
        if ($request->filled('price_max')) {
            $query->where('price', '<=', $request->price_max);
        }
        if ($request->filled('duration_days')) {
            $query->where('duration_days', '<=', $request->duration_days);
        }
        if ($request->filled('best_season')) {
            $query->where('best_season', $request->best_season);
        }
        if ($request->filled('difficulty')) {
            $query->where('difficulty', $request->difficulty);
        }
        if ($request->filled('region')) {
            $query->where('region', $request->region);
        }

        $treks = $query->get();

        return view('recommend.results', compact('treks'));
    }
}

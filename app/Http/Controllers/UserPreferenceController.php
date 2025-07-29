<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPreference;

class UserPreferenceController extends Controller
{
    /**
     * Show the preference form (pre-filled if exists).
     */
    public function showForm()
    {
        $userPreferences = auth()->check()
            ? UserPreference::where('users_id', auth()->id())->first()
            : null;

        return view('preferences.form', compact('userPreferences'));
    }

    /**
     * Store or update user preferences.
     */
    public function store(Request $request)
    {
        $request->validate([
            'budget' => 'nullable|integer|min:0',
            'available_days' => 'nullable|integer|min:1',
            'region' => 'nullable|string',
            'difficulty' => 'nullable|string',
        ]);

        UserPreference::updateOrCreate(
            ['users_id' => auth()->id()],
            [
                'budget' => $request->budget,
                'available_days' => $request->available_days,
                'region' => $request->region,
                'difficulty' => $request->difficulty,
            ]
        );

        return redirect()->back()->with('success', 'Preferences saved!');
    }
}

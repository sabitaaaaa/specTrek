<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPreference;

class UserPreferenceController extends Controller
{
    /**
     * ✅ Show the preference form, pre-filled if data exists.
     * This method checks if the user is logged in and fetches their saved preferences.
     * If found, it passes them to the view (form) for editing.
     */
    public function showForm()
    {
        // 🔍 Get current user's preferences if logged in
        $userPreferences = auth()->check()
            ? UserPreference::where('user_id', auth()->id())->first()
            : null;

        // 📤 Send preferences (if any) to the form view
        return view('preferences.form', compact('userPreferences'));
    }

    /**
     * ✅ Store or update the preferences.
     * This handles both new preference creation and updating existing ones.
     * Uses `updateOrCreate` to prevent duplicates.
     */
    public function store(Request $request)
    {
        // ✅ Validate input data: optional, but must follow rules if present
        $request->validate([
            'budget' => 'nullable|integer|min:0',           // User's max budget for trek
            'available_days' => 'nullable|integer|min:1',   // Max duration user can trek
            'region' => 'nullable|string',                  // Preferred region
            'difficulty' => 'nullable|string',              // Preferred difficulty
        ]);

        // 🧠 Save or update preferences using user_id as unique key
        UserPreference::updateOrCreate(
            ['user_id' => auth()->id()], // Lookup key
            [
                'budget' => $request->budget,
                'available_days' => $request->available_days,
                'region' => $request->region,
                'difficulty' => $request->difficulty,
            ]
        );

        // ✅ Redirect back with success message
        return redirect()->back()->with('success', 'Preferences saved!');
    }
}

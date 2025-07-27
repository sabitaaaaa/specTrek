<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreferenceController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'budget' => 'nullable|integer',
            'available_days' => 'nullable|integer',
            'region' => 'nullable|string',
            'difficulty' => 'nullable|string',
        ]);
        // Save or update user preferences
        UserPreference::updateOrCreate(
            ['user_id' => auth()->id()],
            $validated
        );

        return redirect()->back()->with('success', 'Your preferences have been saved.');
    }
}

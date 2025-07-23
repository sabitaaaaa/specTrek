<?php

namespace App\Http\Controllers;    // <-- add this line

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;  // <-- import base Controller class explicitly

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'review' => 'required|string',
        ]);

        // Save to database
        Review::create($validated);

        // Redirect back with success message
        return back()->with('success', 'Review submitted successfully!');
    }
}

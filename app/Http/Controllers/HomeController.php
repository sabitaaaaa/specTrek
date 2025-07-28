<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\EmergencyContact;

use App\Models\Itinerary;  // Add this import

class HomeController extends Controller
{
    public function index()
    {
        $contacts = EmergencyContact::all();
        $reviews = Review::latest()->take(5)->get();  // Fetch latest 5 reviews
        return view('home', compact('contacts','reviews'));
    }
}

        $reviews = Review::latest()->take(5)->get();

        // Fetch featured itineraries as highlights
        $highlights = Itinerary::where('is_featured', true)
                              ->latest()
                              ->take(6)
                              ->get();

        return view('home', compact('reviews', 'highlights'));

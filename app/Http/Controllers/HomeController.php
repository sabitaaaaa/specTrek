<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\EmergencyContact;


class HomeController extends Controller
{
    public function index()
    {
        $contacts = EmergencyContact::all();
        $reviews = Review::latest()->take(5)->get();  // Fetch latest 5 reviews
        return view('home', compact('contacts','reviews'));
    }
}


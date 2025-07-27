<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;


class HomeController extends Controller
{
    public function index()
    {
        $reviews = Review::latest()->take(5)->get();  // Fetch latest 5 reviews
        return view('home', compact('reviews'));
    }
}

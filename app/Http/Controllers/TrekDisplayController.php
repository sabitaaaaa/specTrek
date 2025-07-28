<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrekDisplayController extends Controller
{
    public function show($slug)
{
    $trek = \App\Models\TrekPackage::where('slug', $slug)->firstOrFail();
    return view('trek.show', compact('trek'));
}
}

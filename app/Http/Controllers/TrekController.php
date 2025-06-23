<?php

namespace App\Http\Controllers;
use App\Models\Trek;
use Illuminate\Http\Request;

class TrekController extends Controller
{

public function index()
{
    $treks = Trek::all();
    return view('treks.index', compact('treks'));
}
}
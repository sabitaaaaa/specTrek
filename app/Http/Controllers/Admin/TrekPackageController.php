<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrekPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'subtitle' => 'nullable|string',
        'hidden_gems' => 'nullable|string',
        'best_time' => 'nullable|string',
        'itinerary' => 'nullable|string',
        'quote' => 'nullable|string',
        'main_image' => 'nullable|image|mimes:jpeg,png,jpg',
        'map_image' => 'nullable|image|mimes:jpeg,png,jpg',
    ]);

    if ($request->hasFile('main_image')) {
        $data['main_image'] = $request->file('main_image')->store('treks', 'public');
    }

    if ($request->hasFile('map_image')) {
        $data['map_image'] = $request->file('map_image')->store('treks', 'public');
    }

    TrekPackage::create($data);

    return redirect()->route('admin.trek-packages.index')->with('success', 'Trek added!');
}

    /**
     * Display the specified resource.
     */
   public function show($slug)
{
    $trek = \App\Models\TrekPackage::where('slug', $slug)->firstOrFail();
    return view('trek.show', compact('trek'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

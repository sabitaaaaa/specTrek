<?php

namespace App\Http\Controllers;

use App\Models\Itinerary;
use Illuminate\Http\Request;

class ItineraryController extends Controller
{
    // List all itineraries
    public function index()
    {
        $itineraries = Itinerary::all();
        return view('itinerary.index', compact('itineraries'));
    }

    // Show form to create new itinerary
    public function create()
    {
        return view('itinerary.create');
    }

    // Store new itinerary
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:itineraries,slug',
            'image1' => 'nullable|image',
            'image2' => 'nullable|image',
            'image3' => 'nullable|image',
            'image4' => 'nullable|image',
        ]);

        $itinerary = new Itinerary();

        // Assign text and HTML fields directly (no JSON involved)
        $itinerary->title = $request->title;
        $itinerary->slug = $request->slug;
        $itinerary->quote = $request->quote;
        $itinerary->description = $request->description;
        $itinerary->best_time = $request->best_time;
        $itinerary->detailed_itinerary = $request->detailed_itinerary;
        $itinerary->note = $request->note;
        $itinerary->transport_table = $request->input('transport_table');
        $itinerary->hidden_gems = $request->input('hidden_gems');
        $itinerary->day_to_day_itinerary = $request->input('day_to_day_itinerary');
        $itinerary->hidden_traditions = $request->input('hidden_traditions');

        // Handle image uploads if any
        foreach (['image1', 'image2', 'image3', 'image4'] as $field) {
            if ($request->hasFile($field)) {
                $path = $request->file($field)->store('itinerary_images', 'public');
                $itinerary->$field = $path;
            }
        }

        $itinerary->save();

        return redirect()->route('itinerary.index')->with('success', 'Itinerary created successfully.');
    }

    // Show form to edit existing itinerary
    public function edit($id)
    {
        $itinerary = Itinerary::findOrFail($id);
        return view('itinerary.edit', compact('itinerary'));
    }

    // Update existing itinerary
    public function update(Request $request, $id)
    {
        // Validate input with slug uniqueness except current record
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:itineraries,slug,' . $id,
            'image1' => 'nullable|image',
            'image2' => 'nullable|image',
            'image3' => 'nullable|image',
            'image4' => 'nullable|image',
        ]);

        $itinerary = Itinerary::findOrFail($id);

        // Update all fields directly as-is
        $itinerary->title = $request->title;
        $itinerary->slug = $request->slug;
        $itinerary->quote = $request->quote;
        $itinerary->description = $request->description;
        $itinerary->best_time = $request->best_time;
        $itinerary->detailed_itinerary = $request->detailed_itinerary;
        $itinerary->note = $request->note;
        $itinerary->transport_table = $request->input('transport_table');
        $itinerary->hidden_gems = $request->input('hidden_gems');
        $itinerary->day_to_day_itinerary = $request->input('day_to_day_itinerary');
        $itinerary->hidden_traditions = $request->input('hidden_traditions');

        // Handle image uploads if any
        foreach (['image1', 'image2', 'image3', 'image4'] as $field) {
            if ($request->hasFile($field)) {
                $path = $request->file($field)->store('itinerary_images', 'public');
                $itinerary->$field = $path;
            }
        }

        $itinerary->save();

        return redirect()->route('itinerary.index')->with('success', 'Itinerary updated successfully.');
    }

    // Show details of a single itinerary
    public function show($id)
    {
        $itinerary = Itinerary::findOrFail($id);
        return view('itinerary.show', compact('itinerary'));
    }

    // Delete an itinerary
    public function destroy($id)
    {
        $itinerary = Itinerary::findOrFail($id);
        $itinerary->delete();

        return redirect()->route('itinerary.index')->with('success', 'Itinerary deleted successfully.');
    }
}

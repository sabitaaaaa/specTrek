<?php

namespace App\Http\Controllers;

use App\Models\Itinerary;
use Illuminate\Http\Request;

class ItineraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itineraries = Itinerary::all();
        return view('itinerary.index', compact('itineraries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('itinerary.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:itineraries,slug',
            'hidden_gems' => 'nullable|string',
            'day_to_day_itinerary' => 'nullable|string',
            'detailed_itinerary' => 'nullable|string',
            'transport_table' => 'nullable|string',
            'hidden_traditions' => 'nullable|string',
            'best_time' => 'nullable|string|max:255',
            'note' => 'nullable|string',
            // New fields
            'image1' => 'nullable|string|max:255',
            'image2' => 'nullable|string|max:255',
            'image3' => 'nullable|string|max:255',
            'image4' => 'nullable|string|max:255',
            'quote' => 'nullable|string',
        ]);

        $hidden_gems = $request->input('hidden_gems')
            ? json_encode(array_map('trim', explode(',', $request->input('hidden_gems'))))
            : json_encode([]);

        $day_to_day_itinerary = $request->input('day_to_day_itinerary')
            ? json_encode(array_filter(array_map('trim', explode("\n", $request->input('day_to_day_itinerary')))))
            : json_encode([]);

        $hidden_traditions = $request->input('hidden_traditions')
            ? json_encode(array_map('trim', explode(',', $request->input('hidden_traditions'))))
            : json_encode([]);

        $itinerary = new Itinerary();
        $itinerary->title = $request->input('title');
        $itinerary->slug = $request->input('slug');
        $itinerary->hidden_gems = $hidden_gems;
        $itinerary->day_to_day_itinerary = $day_to_day_itinerary;
        $itinerary->detailed_itinerary = $request->input('detailed_itinerary');
        $itinerary->transport_table = $request->input('transport_table');
        $itinerary->hidden_traditions = $hidden_traditions;
        $itinerary->best_time = $request->input('best_time');
        $itinerary->note = $request->input('note');

        // Save images and quote
        $itinerary->image1 = $request->input('image1');
        $itinerary->image2 = $request->input('image2');
        $itinerary->image3 = $request->input('image3');
        $itinerary->image4 = $request->input('image4');
        $itinerary->quote = $request->input('quote');

        $itinerary->save();

        return redirect()->route('itinerary.show', $itinerary->slug)
                         ->with('success', 'Itinerary created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $itinerary = Itinerary::where('slug', $slug)->firstOrFail();
        return view('itinerary.show', compact('itinerary'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $itinerary = Itinerary::findOrFail($id);
        return view('itinerary.edit', compact('itinerary'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:itineraries,slug,' . $id,
            'hidden_gems' => 'nullable|string',
            'day_to_day_itinerary' => 'nullable|string',
            'detailed_itinerary' => 'nullable|string',
            'transport_table' => 'nullable|string',
            'hidden_traditions' => 'nullable|string',
            'best_time' => 'nullable|string|max:255',
            'note' => 'nullable|string',
            // New fields
            'image1' => 'nullable|string|max:255',
            'image2' => 'nullable|string|max:255',
            'image3' => 'nullable|string|max:255',
            'image4' => 'nullable|string|max:255',
            'quote' => 'nullable|string',
        ]);

        $itinerary = Itinerary::findOrFail($id);

        $hidden_gems = $request->input('hidden_gems')
            ? json_encode(array_map('trim', explode(',', $request->input('hidden_gems'))))
            : json_encode([]);

        $day_to_day_itinerary = $request->input('day_to_day_itinerary')
            ? json_encode(array_filter(array_map('trim', explode("\n", $request->input('day_to_day_itinerary')))))
            : json_encode([]);

        $hidden_traditions = $request->input('hidden_traditions')
            ? json_encode(array_map('trim', explode(',', $request->input('hidden_traditions'))))
            : json_encode([]);

        $itinerary->title = $request->input('title');
        $itinerary->slug = $request->input('slug');
        $itinerary->hidden_gems = $hidden_gems;
        $itinerary->day_to_day_itinerary = $day_to_day_itinerary;
        $itinerary->detailed_itinerary = $request->input('detailed_itinerary');
        $itinerary->transport_table = $request->input('transport_table');
        $itinerary->hidden_traditions = $hidden_traditions;
        $itinerary->best_time = $request->input('best_time');
        $itinerary->note = $request->input('note');

        // Save images and quote
        $itinerary->image1 = $request->input('image1');
        $itinerary->image2 = $request->input('image2');
        $itinerary->image3 = $request->input('image3');
        $itinerary->image4 = $request->input('image4');
        $itinerary->quote = $request->input('quote');

        $itinerary->save();

        return redirect()->route('itinerary.show', $itinerary->slug)
                         ->with('success', 'Itinerary updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $itinerary = Itinerary::findOrFail($id);
        $itinerary->delete();

        return redirect()->route('itinerary.index')
                         ->with('success', 'Itinerary deleted successfully!');
    }
}

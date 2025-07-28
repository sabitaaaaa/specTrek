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
            'description' => 'nullable|string',
            'quote' => 'nullable|string',
            'image1' => 'nullable|image|max:2048',
            'image2' => 'nullable|image|max:2048',
            'image3' => 'nullable|image|max:2048',
            'image4' => 'nullable|image|max:2048',
        ]);

        // Convert textarea lists to JSON arrays
        $hidden_gems = json_encode(array_filter(array_map('trim', explode("\n", strip_tags($request->input('hidden_gems', ''))))));
        $day_to_day_itinerary = json_encode(array_filter(array_map('trim', explode("\n", strip_tags($request->input('day_to_day_itinerary', ''))))));
        $hidden_traditions = json_encode(array_filter(array_map('trim', explode("\n", strip_tags($request->input('hidden_traditions', ''))))));

        // Handle image uploads
        $images = [];
        for ($i = 1; $i <= 4; $i++) {
            $images[$i] = $request->file("image{$i}") ? $request->file("image{$i}")->store('images', 'public') : null;
        }

        // Create itinerary
        $itinerary = new Itinerary();
        $itinerary->title = strip_tags($request->input('title'));
        $itinerary->slug = strip_tags($request->input('slug'));
        $itinerary->quote = strip_tags($request->input('quote'));
        $itinerary->description = $request->input('description'); // keep raw HTML
        $itinerary->best_time = strip_tags($request->input('best_time'));
        $itinerary->detailed_itinerary = strip_tags($request->input('detailed_itinerary'));
        $itinerary->note = strip_tags($request->input('note'));
        $itinerary->transport_table = strip_tags($request->input('transport_table'));
        $itinerary->hidden_gems = $hidden_gems;
        $itinerary->day_to_day_itinerary = $day_to_day_itinerary;
        $itinerary->hidden_traditions = $hidden_traditions;
        $itinerary->is_featured = $request->has('is_featured');

        // Assign images
        $itinerary->image1 = $images[1];
        $itinerary->image2 = $images[2];
        $itinerary->image3 = $images[3];
        $itinerary->image4 = $images[4];

        $itinerary->save();

        return redirect()->route('itinerary.show', $itinerary->slug)->with('success', 'Itinerary created successfully!');
    }

    // Show single itinerary by slug
    public function show(string $slug)
    {
        $itinerary = Itinerary::where('slug', $slug)->firstOrFail();
        return view('itinerary.show', compact('itinerary'));
    }

    // Show form to edit itinerary
    public function edit(int $id)
    {
        $itinerary = Itinerary::findOrFail($id);
        return view('itinerary.edit', compact('itinerary'));
    }

    // Update existing itinerary
    public function update(Request $request, int $id)
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
            'description' => 'nullable|string',
            'quote' => 'nullable|string',
            'image1' => 'nullable|image|max:2048',
            'image2' => 'nullable|image|max:2048',
            'image3' => 'nullable|image|max:2048',
            'image4' => 'nullable|image|max:2048',
        ]);

        $itinerary = Itinerary::findOrFail($id);

        $hidden_gems = json_encode(array_filter(array_map('trim', explode("\n", strip_tags($request->input('hidden_gems', ''))))));
        $day_to_day_itinerary = json_encode(array_filter(array_map('trim', explode("\n", strip_tags($request->input('day_to_day_itinerary', ''))))));
        $hidden_traditions = json_encode(array_filter(array_map('trim', explode("\n", strip_tags($request->input('hidden_traditions', ''))))));

        for ($i = 1; $i <= 4; $i++) {
            if ($request->hasFile("image{$i}")) {
                $itinerary->{"image{$i}"} = $request->file("image{$i}")->store('images', 'public');
            }
        }

        $itinerary->title = strip_tags($request->input('title'));
        $itinerary->slug = strip_tags($request->input('slug'));
        $itinerary->quote = strip_tags($request->input('quote'));
        $itinerary->description = $request->input('description');
        $itinerary->best_time = strip_tags($request->input('best_time'));
        $itinerary->detailed_itinerary = strip_tags($request->input('detailed_itinerary'));
        $itinerary->note = strip_tags($request->input('note'));
        $itinerary->transport_table = strip_tags($request->input('transport_table'));
        $itinerary->hidden_gems = $hidden_gems;
        $itinerary->day_to_day_itinerary = $day_to_day_itinerary;
        $itinerary->hidden_traditions = $hidden_traditions;
        $itinerary->is_featured = $request->has('is_featured');

        $itinerary->save();

        return redirect()->route('itinerary.show', $itinerary->slug)->with('success', 'Itinerary updated successfully!');
    }

    // Delete itinerary
    public function destroy(int $id)
    {
        $itinerary = Itinerary::findOrFail($id);
        $itinerary->delete();

        return redirect()->route('itinerary.index')->with('success', 'Itinerary deleted successfully!');
    }
}

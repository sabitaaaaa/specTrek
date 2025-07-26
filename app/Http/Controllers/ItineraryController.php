<?php

namespace App\Http\Controllers;

use App\Models\Itinerary;
use Illuminate\Http\Request;

class ItineraryController extends Controller
{
    /**
     * Display a listing of itineraries.
     */
    public function index()
    {
        $itineraries = Itinerary::all();
        return view('itinerary.index', compact('itineraries'));
    }

    /**
     * Show the form for creating a new itinerary.
     */
    public function create()
    {
        return view('itinerary.create');
    }

    /**
     * Store a newly created itinerary in storage.
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
            'description' => 'nullable|string',
            'image1' => 'nullable|image|max:2048',
            'image2' => 'nullable|image|max:2048',
            'image3' => 'nullable|image|max:2048',
            'image4' => 'nullable|image|max:2048',
            'quote' => 'nullable|string',
        ]);

        // Convert multiline textareas (one item per line) to JSON arrays
        $hidden_gems = $request->input('hidden_gems')
            ? json_encode(array_filter(array_map('trim', explode("\n", $request->input('hidden_gems')))))
            : json_encode([]);

        $day_to_day_itinerary = $request->input('day_to_day_itinerary')
            ? json_encode(array_filter(array_map('trim', explode("\n", $request->input('day_to_day_itinerary')))))
            : json_encode([]);

        $hidden_traditions = $request->input('hidden_traditions')
            ? json_encode(array_filter(array_map('trim', explode("\n", $request->input('hidden_traditions')))))
            : json_encode([]);

        // Handle image uploads
        $images = [];
        for ($i = 1; $i <= 4; $i++) {
            $file = $request->file("image{$i}");
            if ($file) {
                $images[$i] = $file->store('images', 'public'); // stored in storage/app/public/images
            } else {
                $images[$i] = null;
            }
        }

        // Create and save the itinerary
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
        $itinerary->quote = $request->input('quote');
        $itinerary->description = $request->input('description');

        $itinerary->image1 = $images[1];
        $itinerary->image2 = $images[2];
        $itinerary->image3 = $images[3];
        $itinerary->image4 = $images[4];

        $itinerary->save();

        return redirect()->route('itinerary.show', $itinerary->slug)
                         ->with('success', 'Itinerary created successfully!');
    }

    /**
     * Display the specified itinerary by slug.
     */
    public function show(string $slug)
    {
        $itinerary = Itinerary::where('slug', $slug)->firstOrFail();
        return view('itinerary.show', compact('itinerary'));
    }

    /**
     * Show the form for editing the specified itinerary.
     */
    public function edit(int $id)
    {
        $itinerary = Itinerary::findOrFail($id);
        return view('itinerary.edit', compact('itinerary'));
    }

    /**
     * Update the specified itinerary in storage.
     */
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
            'image1' => 'nullable|image|max:2048',
            'image2' => 'nullable|image|max:2048',
            'image3' => 'nullable|image|max:2048',
            'image4' => 'nullable|image|max:2048',
            'quote' => 'nullable|string',
        ]);

        $itinerary = Itinerary::findOrFail($id);

        // Convert multiline textareas to JSON arrays
        $hidden_gems = $request->input('hidden_gems')
            ? json_encode(array_filter(array_map('trim', explode("\n", $request->input('hidden_gems')))))
            : json_encode([]);

        $day_to_day_itinerary = $request->input('day_to_day_itinerary')
            ? json_encode(array_filter(array_map('trim', explode("\n", $request->input('day_to_day_itinerary')))))
            : json_encode([]);

        $hidden_traditions = $request->input('hidden_traditions')
            ? json_encode(array_filter(array_map('trim', explode("\n", $request->input('hidden_traditions')))))
            : json_encode([]);

        // Handle image uploads (only replace if new file uploaded)
        for ($i = 1; $i <= 4; $i++) {
            $file = $request->file("image{$i}");
            if ($file) {
                $itinerary->{"image{$i}"} = $file->store('images', 'public');
            }
        }

        // Update fields
        $itinerary->title = $request->input('title');
        $itinerary->slug = $request->input('slug');
        $itinerary->hidden_gems = $hidden_gems;
        $itinerary->day_to_day_itinerary = $day_to_day_itinerary;
        $itinerary->detailed_itinerary = $request->input('detailed_itinerary');
        $itinerary->transport_table = $request->input('transport_table');
        $itinerary->hidden_traditions = $hidden_traditions;
        $itinerary->best_time = $request->input('best_time');
        $itinerary->note = $request->input('note');
        $itinerary->quote = $request->input('quote');
        $itinerary->description = $request->input('description');

        $itinerary->save();

        return redirect()->route('itinerary.show', $itinerary->slug)
                         ->with('success', 'Itinerary updated successfully!');
    }

    /**
     * Remove the specified itinerary from storage.
     */
    public function destroy(int $id)
    {
        $itinerary = Itinerary::findOrFail($id);
        $itinerary->delete();

        return redirect()->route('itinerary.index')
                         ->with('success', 'Itinerary deleted successfully!');
    }
}

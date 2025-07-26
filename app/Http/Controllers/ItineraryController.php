<?php

namespace App\Http\Controllers;

use App\Models\Itinerary;
use Illuminate\Http\Request;

class ItineraryController extends Controller
{
    public function index()
    {
        $itineraries = Itinerary::all();
        return view('itinerary.index', compact('itineraries'));
    }

    public function create()
    {
        return view('itinerary.create');
    }

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

        // Convert multiline textarea inputs to sanitized JSON arrays
        $hidden_gems = $request->input('hidden_gems')
            ? json_encode(array_filter(array_map(fn($line) => strip_tags(trim($line)), explode("\n", $request->input('hidden_gems')))))
            : json_encode([]);

        $day_to_day_itinerary = $request->input('day_to_day_itinerary')
            ? json_encode(array_filter(array_map(fn($line) => strip_tags(trim($line)), explode("\n", $request->input('day_to_day_itinerary')))))
            : json_encode([]);

        $hidden_traditions = $request->input('hidden_traditions')
            ? json_encode(array_filter(array_map(fn($line) => strip_tags(trim($line)), explode("\n", $request->input('hidden_traditions')))))
            : json_encode([]);

        // Handle image uploads
        $images = [];
        for ($i = 1; $i <= 4; $i++) {
            $file = $request->file("image{$i}");
            $images[$i] = $file ? $file->store('images', 'public') : null;
        }

        // Create itinerary with sanitized content
        $itinerary = new Itinerary();
        $itinerary->title = strip_tags($request->input('title'));
        $itinerary->slug = strip_tags($request->input('slug'));
        $itinerary->hidden_gems = $hidden_gems;
        $itinerary->day_to_day_itinerary = $day_to_day_itinerary;
        $itinerary->detailed_itinerary = strip_tags($request->input('detailed_itinerary'));
        $itinerary->transport_table = strip_tags($request->input('transport_table'));
        $itinerary->hidden_traditions = $hidden_traditions;
        $itinerary->best_time = strip_tags($request->input('best_time'));
        $itinerary->note = strip_tags($request->input('note'));
        $itinerary->quote = strip_tags($request->input('quote'));

        // *** Store raw HTML for description without strip_tags ***
        $itinerary->description = $request->input('description');

        $itinerary->image1 = $images[1];
        $itinerary->image2 = $images[2];
        $itinerary->image3 = $images[3];
        $itinerary->image4 = $images[4];

        $itinerary->save();

        return redirect()->route('itinerary.show', $itinerary->slug)
                         ->with('success', 'Itinerary created successfully!');
    }

    public function show(string $slug)
    {
        $itinerary = Itinerary::where('slug', $slug)->firstOrFail();
        return view('itinerary.show', compact('itinerary'));
    }

    public function edit(int $id)
    {
        $itinerary = Itinerary::findOrFail($id);
        return view('itinerary.edit', compact('itinerary'));
    }

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

        // Sanitize array fields
        $hidden_gems = $request->input('hidden_gems')
            ? json_encode(array_filter(array_map(fn($line) => strip_tags(trim($line)), explode("\n", $request->input('hidden_gems')))))
            : json_encode([]);

        $day_to_day_itinerary = $request->input('day_to_day_itinerary')
            ? json_encode(array_filter(array_map(fn($line) => strip_tags(trim($line)), explode("\n", $request->input('day_to_day_itinerary')))))
            : json_encode([]);

        $hidden_traditions = $request->input('hidden_traditions')
            ? json_encode(array_filter(array_map(fn($line) => strip_tags(trim($line)), explode("\n", $request->input('hidden_traditions')))))
            : json_encode([]);

        // Replace uploaded images if new ones uploaded
        for ($i = 1; $i <= 4; $i++) {
            $file = $request->file("image{$i}");
            if ($file) {
                $itinerary->{"image{$i}"} = $file->store('images', 'public');
            }
        }

        // Update sanitized fields
        $itinerary->title = strip_tags($request->input('title'));
        $itinerary->slug = strip_tags($request->input('slug'));
        $itinerary->hidden_gems = $hidden_gems;
        $itinerary->day_to_day_itinerary = $day_to_day_itinerary;
        $itinerary->detailed_itinerary = strip_tags($request->input('detailed_itinerary'));
        $itinerary->transport_table = strip_tags($request->input('transport_table'));
        $itinerary->hidden_traditions = $hidden_traditions;
        $itinerary->best_time = strip_tags($request->input('best_time'));
        $itinerary->note = strip_tags($request->input('note'));
        $itinerary->quote = strip_tags($request->input('quote'));

        // *** Store raw HTML for description without strip_tags ***
        $itinerary->description = $request->input('description');

        $itinerary->save();

        return redirect()->route('itinerary.show', $itinerary->slug)
                         ->with('success', 'Itinerary updated successfully!');
    }

    public function destroy(int $id)
    {
        $itinerary = Itinerary::findOrFail($id);
        $itinerary->delete();

        return redirect()->route('itinerary.index')
                         ->with('success', 'Itinerary deleted successfully!');
    }
}

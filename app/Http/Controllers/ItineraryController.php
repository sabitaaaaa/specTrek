<?php

namespace App\Http\Controllers;

use App\Models\Itinerary;
use Illuminate\Http\Request;
//for recommendation
use App\Services\RecommendationService;


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
            'trek_id' => 'nullable|exists:treks,id'
        ]);
        // When creating:
$itinerary->trek_id = $request->input('trek_id');

        $hidden_gems = $request->input('hidden_gems')
            ? json_encode(array_filter(array_map(fn($line) => strip_tags(trim($line)), explode("\n", $request->input('hidden_gems')))))
            : json_encode([]);

        $day_to_day_itinerary = $request->input('day_to_day_itinerary')
            ? json_encode(array_filter(array_map(fn($line) => strip_tags(trim($line)), explode("\n", $request->input('day_to_day_itinerary')))))
            : json_encode([]);

        $hidden_traditions = $request->input('hidden_traditions')
            ? json_encode(array_filter(array_map(fn($line) => strip_tags(trim($line)), explode("\n", $request->input('hidden_traditions')))))
            : json_encode([]);

        $images = [];
        for ($i = 1; $i <= 4; $i++) {
            $file = $request->file("image{$i}");
            $images[$i] = $file ? $file->store('images', 'public') : null;
        }

        $itinerary = new Itinerary();
        $itinerary->title = strip_tags($request->input('title'));
        $itinerary->slug = strip_tags($request->input('slug'));
        $itinerary->hidden_gems = $hidden_gems;
        $itinerary->day_to_day_itinerary = $day_to_day_itinerary;
        $itinerary->detailed_itinerary = strip_tags($request->input('detailed_itinerary'));
        // Store raw HTML for transport_table (don't strip tags)
        $itinerary->transport_table = $request->input('transport_table');
        $itinerary->hidden_traditions = $hidden_traditions;
        $itinerary->best_time = strip_tags($request->input('best_time'));
        $itinerary->note = strip_tags($request->input('note'));
        $itinerary->quote = strip_tags($request->input('quote'));
        // Store raw HTML for description (don't strip tags)
        $itinerary->description = $request->input('description');

        $itinerary->image1 = $images[1];
        $itinerary->image2 = $images[2];
        $itinerary->image3 = $images[3];
        $itinerary->image4 = $images[4];

        $itinerary->save();

        return redirect()->route('itinerary.show', $itinerary->slug)
                         ->with('success', 'Itinerary created successfully!');
    }

// updated with recommendation logic
public function show(string $slug)
{
    $itinerary = Itinerary::where('slug', $slug)->firstOrFail();

    $recommendations = collect(); // default empty
    $preferenceRecommendations = collect(); // default empty

    if (auth()->check()) {
        // Track user behavior
       if ($itinerary->trek_id) {
    RecommendationService::trackUserView(auth()->id(), $itinerary->trek_id);
}


        // Get recommended treks for this user
        $recommendations = RecommendationService::getRecommendationsForUser(auth()->id());

        // Example: You might also want preference-based recommendations here:
        $preferenceRecommendations = RecommendationService::getPreferenceRecommendationsForUser(auth()->id());
    }

    // Pass both variables to the view
    return view('itinerary.show', compact('itinerary', 'recommendations', 'preferenceRecommendations'));
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

        $hidden_gems = $request->input('hidden_gems')
            ? json_encode(array_filter(array_map(fn($line) => strip_tags(trim($line)), explode("\n", $request->input('hidden_gems')))))
            : json_encode([]);

        $day_to_day_itinerary = $request->input('day_to_day_itinerary')
            ? json_encode(array_filter(array_map(fn($line) => strip_tags(trim($line)), explode("\n", $request->input('day_to_day_itinerary')))))
            : json_encode([]);

        $hidden_traditions = $request->input('hidden_traditions')
            ? json_encode(array_filter(array_map(fn($line) => strip_tags(trim($line)), explode("\n", $request->input('hidden_traditions')))))
            : json_encode([]);

        for ($i = 1; $i <= 4; $i++) {
            $file = $request->file("image{$i}");
            if ($file) {
                $itinerary->{"image{$i}"} = $file->store('images', 'public');
            }
        }

        $itinerary->title = strip_tags($request->input('title'));
        $itinerary->slug = strip_tags($request->input('slug'));
        $itinerary->hidden_gems = $hidden_gems;
        $itinerary->day_to_day_itinerary = $day_to_day_itinerary;
        $itinerary->detailed_itinerary = strip_tags($request->input('detailed_itinerary'));
        // Store raw HTML for transport_table
        $itinerary->transport_table = $request->input('transport_table');
        $itinerary->hidden_traditions = $hidden_traditions;
        $itinerary->best_time = strip_tags($request->input('best_time'));
        $itinerary->note = strip_tags($request->input('note'));
        $itinerary->quote = strip_tags($request->input('quote'));
        // Store raw HTML for description
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
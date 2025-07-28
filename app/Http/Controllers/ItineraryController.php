<?php

namespace App\Http\Controllers;

use App\Models\Itinerary;
use Illuminate\Http\Request;
use App\Services\RecommendationService;

class ItineraryController extends Controller
{
    // List all itineraries
    public function index()
    {
        $itineraries = Itinerary::all();
        return view('itinerary.index', compact('itineraries'));
    }

    // Show form to create a new itinerary
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
            'quote' => 'nullable|string',
            'description' => 'nullable|string',
            'best_time' => 'nullable|string|max:255',
            'detailed_itinerary' => 'nullable|string',
            'note' => 'nullable|string',
            'transport_table' => 'nullable|string',
            'hidden_gems' => 'nullable|string',
            'day_to_day_itinerary' => 'nullable|string',
            'hidden_traditions' => 'nullable|string',
            'itinerary_id' => 'nullable|exists:itinerary,id',
            'image1' => 'nullable|image|max:2048',
            'image2' => 'nullable|image|max:2048',
            'image3' => 'nullable|image|max:2048',
            'image4' => 'nullable|image|max:2048',
        ]);

        $itinerary = new Itinerary();

        $itinerary->title = $request->title;
        $itinerary->slug = $request->slug;
        $itinerary->quote = $request->quote;
        $itinerary->description = $request->description; // allow HTML
        $itinerary->best_time = $request->best_time;
        $itinerary->detailed_itinerary = $request->detailed_itinerary;
        $itinerary->note = $request->note;
        $itinerary->transport_table = $request->transport_table;
        $itinerary->hidden_gems = $request->hidden_gems;
        $itinerary->day_to_day_itinerary = $request->day_to_day_itinerary;
        $itinerary->hidden_traditions = $request->hidden_traditions;
        $itinerary->itinerary_id = $request->itinerary_id;

        foreach (['image1', 'image2', 'image3', 'image4'] as $field) {
            if ($request->hasFile($field)) {
                $path = $request->file($field)->store('itinerary_images', 'public');
                $itinerary->$field = $path;
            }
        }

        $itinerary->save();

        return redirect()->route('itinerary.show', $itinerary->slug)->with('success', 'Itinerary created successfully!');
    }

    // Show itinerary detail page with recommendations
    public function show(string $slug)
    {
        $itinerary = Itinerary::where('slug', $slug)->firstOrFail();

        $recommendations = collect();
        $preferenceRecommendations = collect();

        if (auth()->check()) {
           RecommendationService::trackUserView(auth()->id(), $itinerary->id);
            $recommendations = RecommendationService::getRecommendationsForUser(auth()->id());
            $preferenceRecommendations = RecommendationService::getPreferenceRecommendationsForUser(auth()->id());
        }

        return view('itinerary.show', compact('itinerary', 'recommendations', 'preferenceRecommendations'));
    }

    // Show form to edit itinerary
    public function edit(int $id)
    {
        $itinerary = Itinerary::findOrFail($id);
        return view('itinerary.edit', compact('itinerary'));
    }

    // Update itinerary
    public function update(Request $request, int $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:itineraries,slug,' . $id,
            'quote' => 'nullable|string',
            'description' => 'nullable|string',
            'best_time' => 'nullable|string|max:255',
            'detailed_itinerary' => 'nullable|string',
            'note' => 'nullable|string',
            'transport_table' => 'nullable|string',
            'hidden_gems' => 'nullable|string',
            'day_to_day_itinerary' => 'nullable|string',
            'hidden_traditions' => 'nullable|string',
            'image1' => 'nullable|image|max:2048',
            'image2' => 'nullable|image|max:2048',
            'image3' => 'nullable|image|max:2048',
            'image4' => 'nullable|image|max:2048',
        ]);

        $itinerary = Itinerary::findOrFail($id);

        $itinerary->title = $request->title;
        $itinerary->slug = $request->slug;
        $itinerary->quote = $request->quote;
        $itinerary->description = $request->description;
        $itinerary->best_time = $request->best_time;
        $itinerary->detailed_itinerary = $request->detailed_itinerary;
        $itinerary->note = $request->note;
        $itinerary->transport_table = $request->transport_table;
        $itinerary->hidden_gems = $request->hidden_gems;
        $itinerary->day_to_day_itinerary = $request->day_to_day_itinerary;
        $itinerary->hidden_traditions = $request->hidden_traditions;

        foreach (['image1', 'image2', 'image3', 'image4'] as $field) {
            if ($request->hasFile($field)) {
                $path = $request->file($field)->store('itinerary_images', 'public');
                $itinerary->$field = $path;
            }
        }

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

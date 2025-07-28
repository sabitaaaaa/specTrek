<?php

namespace App\Http\Controllers;

use App\Models\Itinerary;
use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Services\RecommendationService;
=======
>>>>>>> origin/merged-ayushma

class ItineraryController extends Controller
{
    // List all itineraries
    public function index()
    {
        $itineraries = Itinerary::all();
        return view('itinerary.index', compact('itineraries'));
    }

<<<<<<< HEAD
    // Show form to create a new itinerary
=======
    // Show form to create new itinerary
>>>>>>> origin/merged-ayushma
    public function create()
    {
        return view('itinerary.create');
    }

    // Store new itinerary
    public function store(Request $request)
    {
<<<<<<< HEAD
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
=======
        // Validate input
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:itineraries,slug',
            'image1' => 'nullable|image',
            'image2' => 'nullable|image',
            'image3' => 'nullable|image',
            'image4' => 'nullable|image',
>>>>>>> origin/merged-ayushma
        ]);

        $itinerary = new Itinerary();

<<<<<<< HEAD
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

=======
        // Assign text and HTML fields directly (no JSON involved)
>>>>>>> origin/merged-ayushma
        $itinerary->title = $request->title;
        $itinerary->slug = $request->slug;
        $itinerary->quote = $request->quote;
        $itinerary->description = $request->description;
        $itinerary->best_time = $request->best_time;
        $itinerary->detailed_itinerary = $request->detailed_itinerary;
        $itinerary->note = $request->note;
<<<<<<< HEAD
        $itinerary->transport_table = $request->transport_table;
        $itinerary->hidden_gems = $request->hidden_gems;
        $itinerary->day_to_day_itinerary = $request->day_to_day_itinerary;
        $itinerary->hidden_traditions = $request->hidden_traditions;

=======
        $itinerary->transport_table = $request->input('transport_table');
        $itinerary->hidden_gems = $request->input('hidden_gems');
        $itinerary->day_to_day_itinerary = $request->input('day_to_day_itinerary');
        $itinerary->hidden_traditions = $request->input('hidden_traditions');
        $itinerary->is_featured = $request->has('is_featured');//for highlights


        // Handle image uploads if any
>>>>>>> origin/merged-ayushma
        foreach (['image1', 'image2', 'image3', 'image4'] as $field) {
            if ($request->hasFile($field)) {
                $path = $request->file($field)->store('itinerary_images', 'public');
                $itinerary->$field = $path;
            }
        }

        $itinerary->save();

<<<<<<< HEAD
        return redirect()->route('itinerary.show', $itinerary->slug)->with('success', 'Itinerary updated successfully!');
    }

    // Delete itinerary
    public function destroy(int $id)
=======
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
        $itinerary->is_featured = $request->has('is_featured'); //for highlights


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
>>>>>>> origin/merged-ayushma
    {
        $itinerary = Itinerary::findOrFail($id);
        $itinerary->delete();

<<<<<<< HEAD
        return redirect()->route('itinerary.index')->with('success', 'Itinerary deleted successfully!');
=======
        return redirect()->route('itinerary.index')->with('success', 'Itinerary deleted successfully.');
>>>>>>> origin/merged-ayushma
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Review;
use App\Models\EmergencyContact;
use App\Models\Itinerary;

class HomeController extends Controller
{
    public function index()
    {
        // Get emergency contacts
        $contacts = EmergencyContact::all();

        // Get the latest 5 reviews
        $reviews = Review::latest()->take(5)->get();

        // Get featured itineraries
        $highlights = Itinerary::where('is_featured', true)
                                ->latest()
                                ->take(6)
                                ->get();

        // Get the logo path from the settings table
        $site_logo = DB::table('settings')->where('key', 'site_logo')->value('value');

        // Return everything to the home view
        return view('home', compact('contacts', 'reviews', 'highlights', 'site_logo'));
    }

    public function updateLogo(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'site_logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Set the upload path
        $path = 'uploaded/loggo/';
        $fullPath = public_path($path);

        // Ensure the directory exists
        if (!file_exists($fullPath)) {
            mkdir($fullPath, 0777, true);
        }

        // Check if writable
        if (!is_writable($fullPath)) {
            return back()->with('error', "The folder '$fullPath' is not writable. Please check folder permissions.");
        }

        // Proceed with upload
        if ($request->hasFile('site_logo')) {
            $file = $request->file('site_logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($fullPath, $filename);

            $logoPath = $path . $filename; // Save relative path in DB

            // Insert or update the logo path in the settings table
            DB::table('settings')->updateOrInsert(
                ['key' => 'site_logo'],
                ['value' => $logoPath, 'updated_at' => now()]
            );

            return back()->with('success', 'Site logo updated successfully.');
        }

        return back()->with('error', 'No file uploaded.');
    }
}

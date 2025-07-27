<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Review;

class HomeController extends Controller
{


public function index()
{
    // Get the logo path from the settings table
    $site_logo = DB::table('settings')->where('key', 'site_logo')->value('value');

    // Fetch the latest 5 reviews
    $reviews = Review::latest()->take(5)->get();

    // Return both to the view
    return view('home', compact('site_logo', 'reviews'));
}

public function updateLogo(Request $request)
{
    // Validate the uploaded file
    $request->validate([
        'site_logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Target path
    $path = 'uploaded\loggo';
    $fullPath = public_path($path);

   // Ensure the directory exists
    if (!file_exists($fullPath)) {
        mkdir($fullPath, 0777, true);
    }

    // Check if the directory is writable
    if (!is_writable($fullPath)) {
        return back()->with('error', "The folder '$fullPath' is not writable.
        Please check folder permissions.");
    }

    // Proceed with upload
    if ($request->hasFile('site_logo')) {
        $file = $request->file('site_logo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move($fullPath, $filename);

        $logoPath = $path . $filename; // relative path for DB

        // Save or update in settings table
        DB::table('settings')->updateOrInsert(
            ['key' => 'site_logo'],
            ['value' => $logoPath, 'updated_at' => now()]
        );

        return back()->with('success', 'Site logo updated successfully.');
    }

    return back()->with('error', 'No file uploaded.');
}

}

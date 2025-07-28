<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminProfileController extends Controller
{public function index()
    {
        return view('profile.edit'); // Make sure this Blade file exists
    }
    public function updateLogo(Request $request)
    {
        // Validate input
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Ensure the folder exists
        $logoPath = public_path('logo');
        if (!File::exists($logoPath)) {
            File::makeDirectory($logoPath, 0777, true);
        }

        // Handle file upload
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($logoPath, $filename);

            // Optional: Store file path in DB or session, example:
            // Setting::updateOrInsert(['key' => 'site_logo'], ['value' => $filename]);

            return back()->with('success', 'Logo uploaded successfully!');
        }

        return back()->with('error', 'Logo upload failed!');
    }
}

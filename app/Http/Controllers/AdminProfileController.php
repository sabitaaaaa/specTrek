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
    if ($request->hasFile('site_logo')) {
        $file = $request->file('site_logo');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = public_path('logo'); // or storage_path()

        // Store file
        $file->move($path, $filename);

        // Save to database (make sure model is correct)
        Setting::updateOrCreate(
            ['key' => 'site_logo'], // condition
            ['value' => 'logo/' . $filename] // update this value
        );
    }

    return redirect()->back()->with('success', 'Logo updated successfully.');
}
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Setting;  
use App\Models\Review; 

class HomeController extends Controller
{
 public function index()
    {
        // Get the logo path from settings table
        $site_logo = DB::table('settings')->where('key', 'site_logo')->value('value');

        return view('home', compact('site_logo'));
    }
   public function updateLogo(Request $request)
{
    $request->validate([
        'site_logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $logoPath = null;

    if ($request->hasFile('site_logo')) {
        $file = $request->file('site_logo');
        $path = 'logo/';
        $filename = time() . '_' . $file->getClientOriginalName();

        $fullPath = public_path($path);
        if (!file_exists($fullPath)) {
            mkdir($fullPath, 0777, true);
        }

        $file->move($fullPath, $filename);
        $logoPath = $path . $filename;
    }

    // Correct way: update or insert using 'key' => 'site_logo'
    DB::table('settings')->updateOrInsert(
        ['key' => 'site_logo'],
        ['value' => $logoPath, 'updated_at' => now()]
    );

    return back()->with('success', 'Site logo updated successfully.');
}

}
<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    public function index()
    {
        $logo = setting('site_logo', 'default-logo.png');
        $theme = setting('site_theme', 'light');
        return view('admin.profile', compact('logo', 'theme'));
    }

    public function update(Request $request)
    {
        // Logo upload
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo')->store('logos', 'public');
            save_setting('site_logo', $logo);
        }

        // Theme update
} 
}
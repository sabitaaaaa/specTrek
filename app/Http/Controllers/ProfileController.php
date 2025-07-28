<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Setting;

class ProfileController extends Controller
{
    public function edit()
    {
        $setting = Setting::first();
        return view('profile.edit', compact('setting'));
    }

    public function uploadLogo(Request $request)
    {
        $request->validate([
            'site_logo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $setting = Setting::first();

        if ($request->hasFile('site_logo')) {
            $file = $request->file('site_logo');
            $filename = time() . '_' . $file->getClientOriginalName();

            $destinationPath = public_path('logo');

            // Make sure the directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Check directory permissions
            if (!is_writable($destinationPath)) {
                return redirect()->back()->with('error', 'Upload directory is not writable.');
            }

            // Delete previous logo if exists
            if ($setting && $setting->site_logo && file_exists(public_path($setting->site_logo))) {
                unlink(public_path($setting->site_logo));
            }

            // Move uploaded file
            $file->move($destinationPath, $filename);
            $logoPath = 'logo/' . $filename;

            // Store or update logo path in DB
            DB::table('settings')->updateOrInsert(
                ['key' => 'site_logo'],
                [
                    'value' => $logoPath,
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );

            return redirect()->back()->with('success', 'Logo uploaded and saved.');
        }

        return redirect()->back()->with('error', 'No file uploaded.');
    }

    public function index()
    {
        $setting = Setting::first();
        $logo = $setting->value ?? 'default-logo.png';
        $theme = $setting->site_theme ?? 'light';

        return view('admin.profile', compact('logo', 'theme'));
    }
}

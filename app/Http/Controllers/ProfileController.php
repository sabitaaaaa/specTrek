<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
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
=======
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
>>>>>>> origin/merged-anushree
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm(Request $request)
    {
        // Save custom redirect if passed as query (?redirect=/something)
        if ($request->has('redirect')) {
            Session::put('url.intended_custom', $request->query('redirect'));
        }

        return view('login');
    }

    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required'
    //     ]);

    //     if (Auth::attempt($request->only('email', 'password'))) {
    //         $request->session()->regenerate();

    //         // Redirect admin or user
    //         if (Auth::user()->role === 'admin') {
    //             return redirect('/admin-dashboard');
    //         } else {
    //             return redirect('/home');
    //         }

    //     }

    //     return back()->with('error', 'Invalid email or password.');
    // }
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($request->only('email', 'password'))) {
        $request->session()->regenerate();

        // Check role and redirect accordingly
        if (Auth::user()->role === 'admin') {
            return redirect('/admin-dashboard');
        } else {
            return redirect('/');
            // Check if there's a custom redirect URL in session
            $redirectTo = Session::pull('url.intended_custom', null);

            // Priority: Custom redirect > Role-based redirect > Default
            if ($redirectTo) {
                return redirect($redirectTo);
            }

            if ($user->role === 'admin') {
                return redirect('/admin-dashboard');
            } elseif ($user->role === 'editor') {
                return redirect('/itinerary');
            }

            return redirect('/'); // default fallback
        }
    }

    return back()->with('error', 'Invalid email or password.');
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

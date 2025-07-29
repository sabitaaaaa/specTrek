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
        // Store redirect URL if provided
        if ($request->has('redirect')) {
            Session::put('url.intended_custom', $request->query('redirect'));
        }

        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            $user = Auth::user();
            $redirectTo = Session::pull('url.intended_custom', null);

            if ($user->role === 'admin') {
                return redirect('/admin-dashboard');
            } elseif ($user->role === 'editor') {
                return redirect('/itinerary');
            } elseif ($redirectTo) {
                return redirect($redirectTo);
            } else {
                return redirect('/');
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

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\LoginNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:5',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $user->notify(new LoginNotification());

            // Redirect based on email
            $email = strtolower($user->email);

            if ($email === 'sabita23@gmail.com') {
                return redirect('/admin-dashboard');
            } elseif ($email === 'ayushma23@gmail.com') {
                return redirect('/itinerary');
            }

            return redirect('/home');
        }

        return back()->with('error', 'Invalid login credentials');
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:5',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $user->notify(new LoginNotification());

            if (strtolower($user->email) === 'sabita23@gmail.com') {
                return redirect('/admin-dashboard');
            }
            else

            return redirect('/home');
        }

        return back()->with('error', 'Invalid login credentials');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);


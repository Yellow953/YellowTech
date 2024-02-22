<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/login');
    }
    public function showRegistrationForm()
    {
        return view('auth/register');
    }

    public function register(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        // Create a new user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone' => $request->input('phone'),
            'role' => 'user'

        ]);

        return redirect('/')->with('success', 'Registration successful!');
    }
    public function showLoginForm()
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $user = auth()->user();

            if ($user->role == 'admin') {
                return redirect('admin.users.index')->with('success', 'Admin account successfully logged in!');
            } else {
                return redirect('index')->with('error', 'Not an admin');
            }
        }

        return redirect()->back()->withInput($request->only('email'))->with('error', 'Invalid credentials');
    }
}

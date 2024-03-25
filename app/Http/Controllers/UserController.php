<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::select('id', 'name', 'email', 'role', 'phone', 'created_at')->get();
        return view('admin.users.index', compact('users'));
    }

    public function new()
    {
        return view('admin.users.new');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => $request->has('role') ? 'admin' : 'user',
        ]);

        Log::create([
            'text' => ucwords(auth()->user()->name) .  ' created a new user: ' . $request->name . ', datetime: ' . now(),
        ]);

        return redirect()->route('users')->with('success', 'User created successfully');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'nullable|string|min:2',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'role' => $request->has('role') ? 'admin' : 'user',
            'phone' => $request->phone,
        ]);

        Log::create([
            'text' => ucwords(auth()->user()->name) .  ' edited user: ' . $user->name . ', datetime: ' . now(),
        ]);

        return redirect()->route('users')->with('warning', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();

        Log::create([
            'text' => ucwords(auth()->user()->name) .  ' deleted user: ' . $user->name . ', datetime: ' . now(),
        ]);

        return redirect()->back()->with('danger', 'User deleted successfully');
    }
}

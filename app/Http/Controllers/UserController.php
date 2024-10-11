<?php

namespace App\Http\Controllers;

use App\Models\Call;
use App\Models\Log;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except(['edit_profile', 'update_profile']);
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
            'city' => $request->city,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role' => $request->role,
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
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'role' => $request->role,
            'phone' => $request->phone,
            'city' => $request->city,
            'address' => $request->address,
        ]);

        Log::create([
            'text' => ucwords(auth()->user()->name) .  ' edited user: ' . $user->name . ', datetime: ' . now(),
        ]);

        return redirect()->route('users')->with('warning', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        if ($user->can_delete()) {
            $text = ucwords(auth()->user()->name) .  " deleted user " . $user->name . ", datetime: " . now();

            $user->delete();
            Log::create(['text' => $text]);

            return redirect()->back()->with('danger', 'user was successfully deleted');
        } else {
            return redirect()->back()->with('danger', 'Unable to delete');
        }
    }

    public function calls(User $user)
    {
        $calls = $user->calls;
        $data = compact('calls', 'user');

        return view('admin.users.calls', $data);
    }

    public function calls_create(User $user, Request $request)
    {
        $request->validate([
            'call_time' => 'required|date',
            'response' => 'nullable|string',
            'reschedule_time' => 'nullable|date|after:call_time',
            'notes' => 'nullable|string',
        ]);

        $call = Call::create([
            'staff_id' => auth()->user()->id,
            'client_id' => $user->id,
            'response' => $request->input('response'),
            'call_time' => Carbon::parse($request->input('call_time')),
            'reschedule' => $request->input('reschedule') ? true : false,
            'reschedule_time' => $request->input('reschedule_time') ? Carbon::parse($request->input('reschedule_time')) : null,
            'notes' => $request->input('notes'),
        ]);

        Log::create([
            'text' => ucwords(auth()->user()->name) .  ' called ' . ucwords($user->name) . ' at ' . $call->call_time . ' with the results of ' . $call->response . ', datetime: ' . now(),
        ]);

        return redirect()->back()->with('success', 'Call Saved Successfully...');
    }

    public function edit_profile()
    {
        $user = auth()->user();
        return view('admin.users.edit_profile', compact('user'));
    }

    public function update_profile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'address' => $request->address,
        ]);

        Log::create([
            'text' => ucwords(auth()->user()->name) .  ' updated his/her Profile, datetime: ' . now(),
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}

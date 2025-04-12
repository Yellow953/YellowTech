<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users,email',
        ]);

        // User::create([
        //     'name' => 'Default Name',
        //     'email' => $request->email,
        //     'password' => Hash::make('password'),
        //     'phone' => '000-000-0000',
        //     'city' => 'Default City',
        //     'address' => 'Default Address',
        //     'role' => 'client',
        // ]);

        session(['subscribed' => true]);

        return response()->json(['success' => true]);
    }
}

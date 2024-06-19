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


        // Create a new user with default values
        User::create([
            'name' => 'Default Name',
            'email' => $request->email,
            'password' => Hash::make('defaultpassword'), // Use a default password
            'phone' => '000-000-0000',
            'city' => 'Default City',
            'address' => 'Default Address',
            'role' => 'client',
        ]);

        // Set a session variable to prevent popup reappearance
        session(['subscribed' => true]);

        return response()->json(['success' => true]);
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    protected function authenticated(Request $request, $user)
    {
        if ($user->role == 'admin' || $user->role == 'staff') {
            return redirect()->route('dashboard');
        } else if ($user->role == 'client') {
            return redirect()->route('ticket');
        } else {
            return redirect()->route('home');
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

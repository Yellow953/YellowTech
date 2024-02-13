<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.users.index');
    }

    public function new()
    {
        return view('admin.users.new');
    }

    public function create(Request $request)
    {
    }

    public function edit(User $user)
    {
        return view('admin.users.edit');
    }

    public function update(User $user, Request $request)
    {
    }

    public function destroy(User $user)
    {
    }
}

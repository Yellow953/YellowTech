<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $logs = Log::with('user')->latest()->get();
        return view('admin.logs.index', compact('logs'));
    }
}

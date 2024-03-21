<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class CalendarController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.calendar.index');
    }

    public function events(Request $request)
    {
        $events = Event::select('id', 'title', 'date')->get();

        return response()->json($events);
    }
}

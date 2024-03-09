<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class CalendarController extends Controller
{
    public function index()
    {
        return view('admin.calendar.index');
    }

    public function events(Request $request)
    {
        $events = Event::select('id', 'title', 'start_date as start', 'end_date as end')->get();

        return response()->json($events);
    }
}

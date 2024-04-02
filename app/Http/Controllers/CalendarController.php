<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        // Fetch events from the database or wherever they are stored
        $events = Event::select('id', 'title', 'date', 'color', 'time')->get();

        // Pass the events to the view
        return view('admin.calendar.index', compact('events'));
    }

    public function events(Request $request)
    {
        $events = Event::select('id', 'title', 'date', 'color', 'time')->get();

        return response()->json($events);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'color' => 'required|string',
            'date' => 'required|date',
            'time' => 'nullable|date_format:H:i',
        ]);

        $event = new Event();
        $event->title = $request->title;
        $event->color = $request->color;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->user_id = Auth::id();
        $event->save();

        return response()->json(['message' => 'Event created successfully', 'event' => $event]);
    }
}

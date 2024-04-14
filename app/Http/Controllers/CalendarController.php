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
        $events = Event::select('id', 'title', 'date', 'color', 'time')->get();
        return view('admin.calendar.index', compact('events'));
    }

    public function events(Request $request)
    {
        $events = Event::select('id', 'title', 'date', 'color', 'time')->get();

        return response()->json($events);
    }
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'color' => 'required|string',
        ]);

        $event = Event::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'color' => $request->color,
        ]);

        return response()->json(['message' => 'Event created successfully', 'event' => $event]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'date' => 'required|date',
        ]);

        $event = Event::findOrFail($request->id);
        $event->date = $request->date;
        $event->save();

        return response()->json(['message' => 'Event date updated successfully', 'event' => $event]);
    }
}

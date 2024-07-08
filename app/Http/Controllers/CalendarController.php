<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Log;

class CalendarController extends Controller
{
    public function __construct()
    {
        $this->middleware('staff');
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
            'time' => now()->format('H:i:s'),
        ]);

        Log::create([
            'text' => ucwords(auth()->user()->name) .  ' created a new event: ' . $request->title . ' status: ' . $request->status . ' datetime: ' . now(),
        ]);

        return response()->json(['message' => 'Event created successfully', 'event' => $event]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'date' => 'required|date_format:Y-m-d',
            'time' => 'required|date_format:H:i:s',
        ]);

        $event = Event::findOrFail($request->id);
        $event->date = $request->date;
        $event->time = $request->time;
        $event->save();

        Log::create([
            'text' => ucwords(auth()->user()->name) .  ' updated event: ' . $request->title . ' status: ' . $request->status . ' datetime: ' . now(),
        ]);

        return response()->json(['message' => 'Event date and time updated successfully', 'event' => $event]);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);

        $event = Event::findOrFail($request->id);
        $event->delete();

        Log::create([
            'text' => ucwords(auth()->user()->name) .  ' deleted event: ' . $event->title . ' status: ' . $event->status . ' datetime: ' . now(),
        ]);

        return response()->json(['message' => 'Event deleted successfully']);
    }
}

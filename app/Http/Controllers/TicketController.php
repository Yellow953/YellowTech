<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Log;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $tickets = Ticket::all();
        return view('admin.tickets.index', compact('tickets'));
    }

    public function new()
    {

        return view('admin.tickets.new');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'subject' => 'required|string',
            'status' => 'string',
        ]);

        Ticket::create($request->all());
        $text = ucwords(auth()->user()->name) .  " created Ticket: " . $request->name . ", datetime: " . now();
        Log::create(['text' => $text]);
        return redirect()->route('tickets')->with('success', 'Ticket created successfully.');
    }

    public function edit(Ticket $ticket)
    {
        return view('admin.tickets.edit', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'subject' => 'required|string',
            'status' => 'string',
        ]);

        $ticket->update($request->all());
        $text = ucwords(auth()->user()->name) .  " updated Ticket: " . $request->name . ", datetime: " . now();
        Log::create(['text' => $text]);
        return  redirect()->route('tickets')->with('success', 'Ticket updated successfully.');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        $text = ucwords(auth()->user()->name) .  " deleted Ticket: " . $request->name . ", datetime: " . now();
        Log::create(['text' => $text]);
        return redirect()->route('tickets')->with('success', 'Ticket deleted successfully.');
    }

    public function images(Ticket $ticket)
    {

        return view('admin.tickets.images', compact('ticket'));
    }
}

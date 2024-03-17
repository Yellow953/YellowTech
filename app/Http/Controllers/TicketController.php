<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
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
            'title' => 'required|string',
            'description' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id',
            'status' => 'required|string',
        ]);

        Ticket::create($request->all());

        return redirect()->route('tickets')->with('success', 'Ticket created successfully.');
    }

    public function edit(Ticket $ticket)
    {
        return view('admin.tickets.edit', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id',
            'status' => 'required|string',
        ]);

        $ticket->update($request->all());

        return redirect()->route('tickets')->with('success', 'Ticket updated successfully.');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets')->with('success', 'Ticket deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;

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
        $projects = Project::all();
        $users = User::all();
        $tickets = Ticket::all();
        return view('admin.tickets.new', compact('projects', 'users', 'tickets'));
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
        $projects = Project::all();
        $users = User::all();
        $tickets = Ticket::all();
        return view('admin.tickets.index', compact('projects', 'users', 'tickets'))->with('success', 'Ticket created successfully.');
    }

    public function edit(Ticket $ticket)
    {
        $projects = Project::all();
        $users = User::all();
        $tickets = Ticket::all();
        return view('admin.tickets.edit', compact('projects', 'users', 'ticket'));
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
        $projects = Project::all();
        $users = User::all();
        $tickets = Ticket::all();

        return view('admin.tickets.index', compact('projects', 'users', 'tickets'))->with('success', 'Ticket updated successfully.');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets')->with('success', 'Ticket deleted successfully.');
    }

    public function images(Ticket $ticket)
    {

        return view('admin.tickets.images', compact('ticket'));
    }
}

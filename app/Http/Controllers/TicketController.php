<?php

namespace App\Http\Controllers;

use App\Mail\TicketMailer;
use App\Models\Attachment;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Log;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('create');
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
            'email' => 'required|email',
            'description' => 'required|string',
            'subject' => 'required|string',
            'attachments.*' => 'nullable|file|max:20048',

        ]);

        $ticket = Ticket::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'description' => $request->description,
            'status' => 'new',
        ]);

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $attachment) {
                $filename = $attachment->getClientOriginalName();
                $attachment->move(public_path('uploads/attachments'), $filename);
                Attachment::create([
                    'ticket_id' => $ticket->id,
                    'path' => 'uploads/attachments/' . $filename,
                ]);
            }
        }

        Mail::to([env('MAIL_USERNAME'), $ticket->email])->send(new TicketMailer($ticket));

        $text = ucwords(auth()->user()->name ?? $request->name) .  " created Ticket: " . $request->subject . ", datetime: " . now();
        Log::create(['text' => $text]);

        return redirect()->back()->with('success', 'Ticket created successfully.');
    }

    public function edit(Ticket $ticket)
    {
        return view('admin.tickets.edit', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'description' => 'required|string',
            'subject' => 'required|string',
            'status' => 'string',
        ]);

        $ticket->update([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $attachment) {
                $filename = $attachment->getClientOriginalName();
                $attachment->move(public_path('uploads/attachments'), $filename);
                Attachment::create([
                    'ticket_id' => $ticket->id,
                    'path' => 'uploads/attachments/' . $filename,
                ]);
            }
        }

        $text = ucwords(auth()->user()->name) .  " updated Ticket: " . $request->subject . ", datetime: " . now();
        Log::create(['text' => $text]);

        return  redirect()->route('tickets')->with('success', 'Ticket updated successfully.');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        $text = ucwords(auth()->user()->name) .  " deleted Ticket: " . $ticket->name . ", datetime: " . now();
        Log::create(['text' => $text]);

        return redirect()->route('tickets')->with('success', 'Ticket deleted successfully.');
    }

    public function attachments(Ticket $ticket)
    {
        return view('admin.tickets.attachments', compact('ticket'));
    }
}

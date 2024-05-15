<?php

namespace App\Mail;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class TicketMailer extends Mailable
{
    use Queueable, SerializesModels;
    public $ticket;

    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('no-reply@yellowtech.dev', 'YellowTech'),
            subject: 'New Ticket',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'admin.tickets.mail',
            with: ['ticket' => $this->ticket],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

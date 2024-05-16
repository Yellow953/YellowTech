<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ClientMailer extends Mailable
{
    use Queueable, SerializesModels;

    public $invoice;

    public function __construct(invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('no-reply@yellowtech.dev', 'YellowTech'),
            subject: 'Invoice',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'admin.invoice.mail',
            with: ['invoice' => $this->invoice],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

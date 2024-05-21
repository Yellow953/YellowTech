<?php

namespace App\Mail;

use App\Models\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class InvoiceMailer extends Mailable
{
    use Queueable, SerializesModels;

    public $invoice;

    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('no-reply@yellowtech.dev', 'YellowTech'),
            subject: 'Invoice From YellowTech',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'admin.invoices.mail',
            with: ['invoice' => $this->invoice],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

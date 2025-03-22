<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class MassPayoutCompletedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $totalAmount;
    /**
     * Create a new message instance.
     */
    public function __construct($totalAmount)
    {
        $this->totalAmount = $totalAmount;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Mass Payout Completed',
            from: new Address(\App\Models\Configuration::where('key', 'contact_email')->value('value') ?? tenant()->kyc->business_email, ucfirst(tenant()->id)),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.mass-payout-completed',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}

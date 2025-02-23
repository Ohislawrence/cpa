<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class StatusChangeEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user; 
    public $status;
    public $theMessage;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $status, $theMessage)
    {
        $this->user = $user;
        $this->status = $status;
        $this->theMessage = $theMessage;
        
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(settings()->get('contact_email') ?? tenant()->kyc->business_email, ucfirst(tenant()->id)),
            subject: 'Hi from '.ucfirst(tenant()->id).', your account is '.$this->status ,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.statusEmail',
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

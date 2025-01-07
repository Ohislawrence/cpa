<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $password; 
    public $activeSetting;

    /**
     * Create a new message instance.
     */
    public function __construct($user,$password, $activeSetting)
    {
        $this->user = $user;
        $this->password = $password;
        $this->$activeSetting = $activeSetting;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(\App\Models\Configuration::where('key', 'contact_email')->value('value') ?? tenant()->kyc->business_email, ucfirst(tenant()->id)),
            subject: 'Welcome to '.ucfirst(tenant()->id).' Affiliates – Your Journey Starts Here!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.welcomeEmail',
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

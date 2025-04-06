<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Throwable;

class TenantCreationFailed extends Mailable
{
    use Queueable, SerializesModels;

    public $tenantData;
    public $error;
    public $errorDetails;
    public $timestamp;

    /**
     * Create a new message instance.
     */
    public function __construct(array $tenantData, Throwable $error)
    {
        $this->tenantData = $tenantData;
        $this->error = $error;
        $this->errorDetails = [
            'message' => $error->getMessage(),
            'file' => $error->getFile(),
            'line' => $error->getLine(),
            'trace' => $error->getTraceAsString(),
        ];
        $this->timestamp = now()->toDateTimeString();
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Critical: Tenant Creation Failed',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.tenant-creation-failed',
            with: [
                'businessName' => $this->tenantData['business_name'] ?? 'Unknown',
                'subdomain' => $this->tenantData['subdomain'] ?? 'Unknown',
                'email' => $this->tenantData['business_email'] ?? 'Unknown',
                'errorMessage' => $this->error->getMessage(),
                'errorDetails' => $this->errorDetails,
                'timestamp' => $this->timestamp,
            ],
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

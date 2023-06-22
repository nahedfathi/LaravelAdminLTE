<?php

namespace App\Mail;

use App\Models\company;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewCompanyNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $company;
    /**
     * Create a new message instance.
     */
    public function __construct(company $company)
    {
        $this->company = $company;
    }
    public function build()
    {
        return $this->view('emails.new_company')
                    ->subject('New Company Added');
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Company Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.new_company',
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

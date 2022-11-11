<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $firstname;
    public $lastname;
    public $email;
    public $phoneNumber;
    public $body;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($firstname, $lastname, $email, $phoneNumber, $body)
    {
        //
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->body = $body;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: Str::limit($this->body, 25),
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.contact',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ThankEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $title, $content;
    /**
     * Create a new message instance.
     */
    public function __construct($title, $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'No-Reply FFruit',
        );
    }

    /**
     * Get the message content definition.
     */
    // Cảm ơn vì đã đặt hàng và thanh toán! 🤗
    public function content(): Content
    {
        return new Content(
            view: 'client.pages.mailthank',
            with: [
                'title' => $this->title,
                'content' => $this->content,
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

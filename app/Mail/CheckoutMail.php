<?php

namespace App\Mail;

use App\Models\OrderDetail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CheckoutMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data, $id, $product, $payment_method;
    /**
     * Create a new message instance.
     */
    public function __construct($data, $id, $payment_method)
    {
        $this->data = $data;
        $this->id = $id;
        $this->product = OrderDetail::where('order_id', $this->id)->with('products')->get();
        $this->payment_method = $payment_method;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Checkout Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'client.pages.mailcheckout',
            with: [
                'order' => $this->data,
                'orderDetail' => $this->product,
                'payment_method' => $this->payment_method,
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

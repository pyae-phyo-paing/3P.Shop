<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $orderItems;
    /**
     * Create a new message instance.
     */
    public function __construct($orderItems)
    {
        $this->orderItems = $orderItems;
    }

    public function build()
    {
        return $this->subject('Order Confirmation')
                    ->view('admin.emails.order-confirmation');
    }
}

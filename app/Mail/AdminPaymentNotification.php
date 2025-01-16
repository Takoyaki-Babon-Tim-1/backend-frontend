<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminPaymentNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $user;

    public function __construct($order, $user)
    {
        $this->order = $order;
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('New Payment Received')
            ->view('emails.admin_payment_notification')
            ->with([
                'order' => $this->order,
                'user' => $this->user,
                'products' => $this->order->products,
            ]);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class OrderConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Order confirmation";

    public $orderData = [];
    public $order_id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orderData , $order_id)
    {
        $this->orderData = $orderData;
        $this->order_id = $order_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.order_confirmed');
    }
}

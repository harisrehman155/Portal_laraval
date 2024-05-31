<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $orderId = Crypt::encrypt($this->order->id);
        $view = $this->order->type ? 'email.vectorOrderMail' : 'email.digitizingOrderMail';
        $orderFor = $this->order->type ? 'Vector' : 'Digitizing';
        $email = $this->cc(['admin@terminatorpunch.com'])
            ->subject($orderFor . ' Order Received - Order Id: ' . $this->order->id)
            ->markdown($view)
            ->with(['order' => $this->order, 'user' => auth()->user(), 'filesUrl' => route('download.files', $orderId)]);

        return $email;
    }
}

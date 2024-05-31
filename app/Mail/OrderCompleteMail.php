<?php

namespace App\Mail;

use App\ManageOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;

class OrderCompleteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ManageOrder $order)
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

        $orderFor = $this->order->type ? 'Vector' : 'Digitizing';

        $email = $this->subject($orderFor . ' Order Completed - Order Id: ' . $this->order->id)
            ->markdown('email.orderCompeleteMail')
            ->with(['order' => $this->order, 'user' => auth()->user(), 'filesUrl' => route('download.ordered.files', $orderId)]);

        return $email;
    }
}

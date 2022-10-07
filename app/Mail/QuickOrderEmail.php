<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuickOrderEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $order)
    {
        $this->user = $user;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(__('messages.quick-order.recived', ['code' => $this->order->code]))
                    ->to($this->user->email)
                    ->markdown('emails.html.quick-order', [
                        'user' => $this->user,
                        'order' => $this->order
                    ])
                    ->text('emails.text.quick-order')
                    ->from('sales@dayaartz.com', 'Daya sales');
    }
}

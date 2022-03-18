<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Welcome extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $username = __('Dear user', ['username' => $this->user->fullname ?: __('User')]);
        return $this->subject(__('Welcome to Daya Artz'))
                    ->to($this->user->email)
                    ->markdown('emails.html.welcome', compact('username'))
                    ->text('emails.text.welcome')
                    ->from('sales@dayaartz.com', 'Daya Sales');
    }
}

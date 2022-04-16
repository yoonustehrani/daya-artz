<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $verification_url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $verification_url)
    {
        $this->user = $user;
        $this->verification_url = $verification_url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $username = __('Dear user', ['username' => $this->user->callable_name ?: __('User')]);
        return $this->subject(__('Verify Email Address'))
                    ->to($this->user->email)
                    ->markdown('emails.html.verification', [
                        'user' => $this->user,
                        'verification_url' => $this->verification_url,
                        'username' => $username
                    ])
                    ->text('emails.text.verification')
                    ->from('website@dayaartz.com', 'Daya Website');
    }
}

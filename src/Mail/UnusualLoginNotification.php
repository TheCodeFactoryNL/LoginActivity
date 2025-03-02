<?php

namespace TheCodeFactory\LoginActivity\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UnusualLoginNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $ip, $device;

    public function __construct($user, $ip, $device)
    {
        $this->user = $user;
        $this->ip = $ip;
        $this->device = $device;
    }

    public function build()
    {
        return $this->subject('Unusual login detected')
            ->view('loginactivity::emails.unusual_login');
    }
}

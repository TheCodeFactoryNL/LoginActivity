<?php

namespace TheCodeFactory\LoginActivity\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Mail;
use Jenssegers\Agent\Agent;
use TheCodeFactory\LoginActivity\Mail\UnusualLoginNotification;
use TheCodeFactory\LoginActivity\Models\LoginActivity;

class LogLoginActivity
{
    public function handle(Login $event)
    {
        LoginActivity::create([
            'user_id' => $event->user->id,
            'ip_address' => request()->ip(),
            'user_agent' => request()->header('User-Agent'),
        ]);

        if (LoginActivity::isUnusualLogin($event->user) && config('loginactivity.send_unusual_login_notification')) {
            Mail::to($event->user->email)->send(new UnusualLoginNotification($event->user, request()->ip(), (new Agent())->platform() . ' - ' . (new Agent())->browser()));
        }
    }
}

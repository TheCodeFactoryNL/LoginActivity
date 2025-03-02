<?php

namespace TheCodeFactory\LoginActivity\Listeners;

use Illuminate\Auth\Events\Login;
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
    }
}

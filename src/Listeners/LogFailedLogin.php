<?php

namespace TheCodeFactory\LoginActivity\Listeners;

use Illuminate\Auth\Events\Failed;
use Jenssegers\Agent\Agent;
use TheCodeFactory\LoginActivity\Models\FailedLogin;

class LogFailedLogin
{
    public function handle(Failed $event)
    {
        $agent = new Agent();

        FailedLogin::create([
            'email' => $event->credentials['email'] ?? 'unknown',
            'ip_address' => request()->ip(),
            'device_info' => $agent->platform() . ' - ' . $agent->browser(),
        ]);
    }
}

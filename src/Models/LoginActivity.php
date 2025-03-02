<?php

namespace TheCodeFactory\LoginActivity\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Agent\Agent;

class LoginActivity extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'ip_address', 'user_agent'];

    public static function isUnusualLogin($user)
    {
        $lastLogin = self::where('user_id', $user->id)->latest()->first();

        if (!$lastLogin) {
            return false;
        }

        $currentIp = request()->ip();
        $currentDevice = (new Agent())->platform() . ' - ' . (new Agent())->browser();

        return $lastLogin->ip_address !== $currentIp || $lastLogin->device_info !== $currentDevice;
    }
}
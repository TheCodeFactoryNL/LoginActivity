<?php

namespace TheCodeFactory\LoginActivity\Models;

use Illuminate\Database\Eloquent\Model;

class FailedLogin extends Model
{
    protected $fillable = ['email', 'ip_address', 'device_info', 'attempted_at'];
    public $timestamps = false;
}

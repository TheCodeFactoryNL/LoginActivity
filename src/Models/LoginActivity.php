<?php

namespace TheCodeFactory\LoginTracker\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginActivity extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'ip_address', 'user_agent'];
}

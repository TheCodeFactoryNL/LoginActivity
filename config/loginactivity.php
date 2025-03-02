<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Login Activity Configuration
    |--------------------------------------------------------------------------
    |
    | Here you can adjust the settings for the LoginActivity package.
    |
    */

    'purge_days' => env('LOGIN_ACTIVITY_PURGE_DAYS', 30),

    'send_unusual_login_notification' => env('LOGIN_ACTIVITY_SEND_UNUSUAL_LOGIN_NOTIFICATION', true),
];

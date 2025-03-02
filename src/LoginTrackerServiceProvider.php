<?php

namespace TheCodeFactory\LoginActivity;

use Illuminate\Support\ServiceProvider;

class LoginTrackerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Laad de migraties
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Registreer de event listener voor logins
        $this->app['events']->listen(
            'Illuminate\Auth\Events\Login',
            'TheCodeFactory\LoginTracker\Listeners\LogLoginActivity'
        );
    }

    public function register()
    {
        // Package configuratie registreren (optioneel)
    }
}
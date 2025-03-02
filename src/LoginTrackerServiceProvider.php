<?php

namespace TheCodeFactory\LoginActivity;

use Illuminate\Auth\Events\Failed;
use Illuminate\Support\ServiceProvider;
use TheCodeFactory\LoginActivity\Commands\PurgeOldLoginsCommand;
use TheCodeFactory\LoginActivity\Listeners\LogFailedLogin;

class LoginTrackerServiceProvider extends ServiceProvider
{
    protected $listen = [
        Failed::class => [
            LogFailedLogin::class,
        ],
    ];

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/loginactivity.php' => config_path('loginactivity.php'),
        ], 'config');

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->app['events']->listen(
            'Illuminate\Auth\Events\Login',
            'TheCodeFactory\LoginActivity\Listeners\LogLoginActivity'
        );
    }

    public function register()
    {
        $this->commands([
            PurgeOldLoginsCommand::class,
        ]);
    }
}
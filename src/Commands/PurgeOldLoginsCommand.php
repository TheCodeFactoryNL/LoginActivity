<?php

namespace TheCodeFactory\LoginActivity\Commands;

use Illuminate\Console\Command;
use TheCodeFactory\LoginActivity\Events\LoginsPurged;
use TheCodeFactory\LoginActivity\Models\LoginActivity;

class PurgeOldLoginsCommand extends Command
{
    protected $signature = 'logins:purge {days?}';
    protected $description = 'Delete old login records older than X days';

    public function handle()
    {
        $days = $this->argument('days') ?? config('loginactivity.purge_days');

        $deleted = LoginActivity::where('created_at', '<', now()->subDays($days))->delete();

        event(new LoginsPurged($deleted, $days));

        $this->info("Deleted: $deleted old login records over $days days.");
    }
}

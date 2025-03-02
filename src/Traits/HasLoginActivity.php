<?php

namespace TheCodeFactory\LoginTracker\Traits;

use TheCodeFactory\LoginActivity\Models\LoginActivity;

trait HasLoginActivity
{
    /**
     * Retrieve the user's last login.
     *
     * @return \Illuminate\Support\Collection
     */
    public function lastLogin()
    {
        return LoginActivity::where('user_id', $this->id)
            ->latest()
            ->first(['created_at', 'ip_address', 'user_agent']);
    }

    /**
     * Get the last X logins of the user.
     *
     * @param int $limit
     * @return \Illuminate\Support\Collection
     */
    public function lastLogins($limit = 5)
    {
        return LoginActivity::where('user_id', $this->id)
            ->latest()
            ->limit($limit)
            ->get(['created_at', 'ip_address', 'user_agent']);
    }

    /**
     * Get the total number of logins for the user.
     *
     * @return int
     */
    public function loginCount()
    {
        return LoginActivity::where('user_id', $this->id)->count();
    }

    /**
     * Delete login records older than X days.
     *
     * @param int $days
     * @return int Number of records deleted
     */
    public function purgeOldLogins($days = 30)
    {
        return LoginActivity::where('user_id', $this->id)
            ->where('created_at', '<', now()->subDays($days))
            ->delete();
    }
}

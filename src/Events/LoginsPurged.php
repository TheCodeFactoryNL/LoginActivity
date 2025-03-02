<?php

namespace TheCodeFactory\LoginActivity\Events;

use Illuminate\Foundation\Events\Dispatchable;

class LoginsPurged
{
    use Dispatchable;

    public int $deleted;
    public int $days;

    public function __construct(int $deleted, int $days)
    {
        $this->deleted = $deleted;
        $this->days = $days;
    }
}

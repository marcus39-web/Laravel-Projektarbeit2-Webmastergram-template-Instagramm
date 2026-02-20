<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

/**
 * Registriert Event-Listener für die Anwendung.
 */
class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        \App\Events\NewFollower::class => [
            \App\Listeners\SendNewFollowerNotification::class,
        ],
    ];

    /**
     * Bootstrap für Event-Listener.
     */
    public function boot(): void
    {
        parent::boot();
    }
}

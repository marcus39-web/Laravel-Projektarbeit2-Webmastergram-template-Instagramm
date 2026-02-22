<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

/**
 * Registriert Event-Listener für die Anwendung.
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // User-related events
        \Illuminate\Auth\Events\Registered::class => [
            // \Illuminate\Auth\Listeners\SendEmailVerificationNotification::class,
        ],

        // Application-specific events
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

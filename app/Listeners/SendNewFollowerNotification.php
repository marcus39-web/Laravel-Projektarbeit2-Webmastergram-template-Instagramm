<?php

namespace App\Listeners;

use App\Events\NewFollower;
use App\Mail\NewFollowerMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

/**
 * Listener für neue Follower-Benachrichtigungen.
 */
class SendNewFollowerNotification implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Verarbeitet das NewFollower-Event und sendet eine E-Mail.
     */
    public function handle(NewFollower $event)
    {
        try {
            Mail::to($event->followed->email)->send(new NewFollowerMail($event->followed, $event->follower));
        } catch (\Exception $e) {
            \Log::error('Fehler beim Senden der Follower-Benachrichtigung: ' . $e->getMessage());
        }
    }
}

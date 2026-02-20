<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\User;

/**
 * Benachrichtigung für einen neuen Follower.
 */
class NewFollowerNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $follower;

    /**
     * Erzeugt eine neue Benachrichtigung.
     */
    public function __construct(User $follower)
    {
        $this->follower = $follower;
    }

    /**
     * Gibt die Kanäle zurück, über die die Benachrichtigung gesendet wird.
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Repräsentiert die Benachrichtigung als Array (z.B. für die Datenbank).
     */
    public function toArray($notifiable)
    {
        return [
            'follower_id' => $this->follower->id,
            'follower_name' => $this->follower->name,
        ];
    }
}

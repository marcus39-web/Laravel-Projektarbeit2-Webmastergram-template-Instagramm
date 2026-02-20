<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Mail-Benachrichtigung für einen neuen Follower.
 */
class NewFollowerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $followed;
    public $follower;

    /**
     * Erzeugt eine neue Mail-Instanz.
     */
    public function __construct(User $followed, User $follower)
    {
        $this->followed = $followed;
        $this->follower = $follower;
    }

    /**
     * Baut die E-Mail-Nachricht.
     */
    public function build()
    {
        return $this->subject('Du hast einen neuen Follower!')
            ->view('emails.new_follower');
    }
}

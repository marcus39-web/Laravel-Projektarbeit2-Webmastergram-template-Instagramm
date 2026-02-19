<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewFollowerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $followed;
    public $follower;

    public function __construct(User $followed, User $follower)
    {
        $this->followed = $followed;
        $this->follower = $follower;
    }

    public function build()
    {
        return $this->subject('Du hast einen neuen Follower!')
            ->view('emails.new_follower');
    }
}

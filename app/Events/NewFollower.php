<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewFollower
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $followed;
    public $follower;

    public function __construct(User $followed, User $follower)
    {
        $this->followed = $followed;
        $this->follower = $follower;
    }
}

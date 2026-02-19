<?php

namespace App\Listeners;

use App\Events\NewFollower;
use App\Mail\NewFollowerMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNewFollowerNotification implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(NewFollower $event)
    {
        Mail::to($event->followed->email)->send(new NewFollowerMail($event->followed, $event->follower));
    }
}

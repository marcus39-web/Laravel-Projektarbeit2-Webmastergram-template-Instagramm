<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Zeigt die Benachrichtigungen für neue Follower an.
     */
    public function index(Request $request)
    {
        $notifications = $request->user()->notifications()->where('type', 'App\\Notifications\\NewFollowerNotification')->latest()->get();
        return view('notifications.index', compact('notifications'));
    }
}

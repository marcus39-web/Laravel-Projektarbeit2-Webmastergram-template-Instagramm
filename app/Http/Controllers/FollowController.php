<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Events\NewFollower;
use App\Notifications\NewFollowerNotification;

class FollowController extends Controller
{
    /**
     * Folgt einem Benutzer.
     */
    public function follow(Request $request, $userId): RedirectResponse
    {
        $userToFollow = User::findOrFail($userId);
        $wasFollowing = $request->user()->following()->where('users.id', $userToFollow->id)->exists();
        $request->user()->following()->syncWithoutDetaching([$userToFollow->id]);
        if (!$wasFollowing) {
            event(new NewFollower($userToFollow, $request->user()));
            $userToFollow->notify(new NewFollowerNotification($request->user()));
        }
        return back();
    }

    /**
     * Entfolgt einem Benutzer.
     */
    public function unfollow(Request $request, $userId): RedirectResponse
    {
        $userToUnfollow = User::findOrFail($userId);
        $request->user()->following()->detach($userToUnfollow->id);
        return back();
    }
}

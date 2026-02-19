<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FollowController extends Controller
{
    public function follow(Request $request, $userId): RedirectResponse
    {
        $userToFollow = User::findOrFail($userId);
        $request->user()->following()->syncWithoutDetaching([$userToFollow->id]);
        return back();
    }

    public function unfollow(Request $request, $userId): RedirectResponse
    {
        $userToUnfollow = User::findOrFail($userId);
        $request->user()->following()->detach($userToUnfollow->id);
        return back();
    }
}

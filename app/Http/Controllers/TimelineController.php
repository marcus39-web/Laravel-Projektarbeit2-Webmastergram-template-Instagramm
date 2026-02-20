<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class TimelineController extends Controller
{
    /**
     * Zeigt die Timeline des Benutzers an.
     */
    public function index()
    {
        $user = Auth::user();
        $followingIds = $user->following()->pluck('users.id')->toArray();
        $followingIds[] = $user->id; // Eigene Posts auch anzeigen
        $posts = Post::whereIn('user_id', $followingIds)
            ->with('user')
            ->latest()
            ->paginate(10);

        $followedUsers = $user->following()->get();
        return view('timeline.index', compact('posts', 'followedUsers'));
    }
}

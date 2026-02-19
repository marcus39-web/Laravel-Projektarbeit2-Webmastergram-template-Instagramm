<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class LikeController extends Controller
{
    public function like(Post $post)
    {
        $user = Auth::user();
        $post->likes()->syncWithoutDetaching([$user->id]);
        return back();
    }

    public function unlike(Post $post)
    {
        $user = Auth::user();
        $post->likes()->detach($user->id);
        return back();
    }
}

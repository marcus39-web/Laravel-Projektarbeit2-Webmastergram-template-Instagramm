<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        \Log::info('PostController@store wurde aufgerufen', $request->all());
        try {
            \Log::info('Vor E-Mail-Check');
            if (!$request->user()->hasVerifiedEmail()) {
                \Log::info('E-Mail nicht verifiziert!');
                return redirect()->back()->with('error', 'Du musst deine E-Mail validieren, bevor du posten kannst.');
            }

            \Log::info('Vor Validierung');
            $validated = $request->validate([
                'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:4096'],
                'caption' => ['required', 'string', 'max:500'],
            ]);
            \Log::info('Nach Validierung');

            $path = $request->file('image')->store('posts', 'public');
            \Log::info('Bild gespeichert', ['path' => $path]);

            $userId = \Auth::id();
            \Log::info('User-ID für Post:', ['user_id' => $userId]);
            $post = \App\Models\Post::create([
                'user_id' => $userId,
                'image' => $path,
                'content' => $request->caption,
                'title' => '',
            ]);
            \Log::info('Post gespeichert?', ['post' => $post]);

            return redirect()->route('profile.edit')->with('status', 'post-created');
        } catch (\Throwable $e) {
            \Log::error('Fehler im PostController@store', ['exception' => $e]);
            throw $e;
        }

        // E-Mail-Verifizierung prüfen
        \Log::info('Vor E-Mail-Check');
        if (!$request->user()->hasVerifiedEmail()) {
            \Log::info('E-Mail nicht verifiziert!');
            return redirect()->back()->with('error', 'Du musst deine E-Mail validieren, bevor du posten kannst.');
        }

        \Log::info('Vor Validierung');
        $validated = $request->validate([
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:4096'],
            'caption' => ['required', 'string', 'max:500'],
        ]);
        \Log::info('Nach Validierung');

        $path = $request->file('image')->store('posts', 'public');

        $userId = Auth::id();
        \Log::info('User-ID für Post:', ['user_id' => $userId]);
        $post = \App\Models\Post::create([
            'user_id' => $userId,
            'image' => $path,
            'content' => $request->caption,
            'title' => '',
        ]);
        \Log::info('Post gespeichert?', ['post' => $post]);

        return Redirect()->route('profile.edit')->with('status', 'post-created');
    }
}

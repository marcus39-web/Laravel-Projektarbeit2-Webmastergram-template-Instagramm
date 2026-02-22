<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    /**
     * Speichert einen neuen Post.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:4096'],
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:500'],
        ]);

        try {
            $path = $request->file('image')->store('posts', 'public');
            $post = \App\Models\Post::create([
                'user_id' => $request->user()->id,
                'image' => $path,
                'title' => $request->title,
                'content' => $request->content,
            ]);
        } catch (\Exception $e) {
            \Log::error('Fehler beim Speichern des Posts: ' . $e->getMessage());
            return redirect()->back()->withErrors(['image' => 'Das Bild oder der Post konnte nicht gespeichert werden.']);
        }
        return redirect()->route('profile.edit')->with('status', 'post-created');

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

        try {
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
        } catch (\Exception $e) {
            \Log::error('Fehler beim Speichern des Posts (Variante 2): ' . $e->getMessage());
            return redirect()->back()->withErrors(['image' => 'Das Bild oder der Post konnte nicht gespeichert werden.']);
        }
        return Redirect()->route('profile.edit')->with('status', 'post-created');
    }
}

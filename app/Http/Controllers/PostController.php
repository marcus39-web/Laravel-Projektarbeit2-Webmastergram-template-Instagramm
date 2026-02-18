<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        // E-Mail-Verifizierung prüfen
        if (!$request->user()->hasVerifiedEmail()) {
            return redirect()->back()->with('error', 'Du musst deine E-Mail validieren, bevor du posten kannst.');
        }

        // Hier würde das eigentliche Post-Speichern erfolgen
        // z.B. Post::create([...]);

        return redirect()->back()->with('success', 'Post erfolgreich erstellt!');
    }
}

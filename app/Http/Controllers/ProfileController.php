<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    /**
     * Sucht nach Nutzernamen.
     */
    public function search(Request $request): View
    {
        $query = $request->input('q');
        $searchResults = [];
        if ($query) {
            $searchResults = \App\Models\User::where('name', 'like', '%' . $query . '%')->get();
        }
        return view('profile.edit', [
            'user' => $request->user(),
            'posts' => $request->user()->posts()->latest()->get(),
            'searchResults' => $searchResults,
        ]);
    }
    /**
     * Zeigt das Profilformular des Benutzers an.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
            'posts' => $request->user()->posts()->latest()->get(),
        ]);
    }

    /**
     * Aktualisiert die Profilinformationen des Benutzers.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        try {
            \Log::info('Daten vor dem Speichern', $request->only(['name', 'bio', 'location', 'website', 'twitter', 'instagram']));

            $request->user()->fill($request->only(['name', 'bio', 'location', 'website', 'twitter', 'instagram']));

            if ($request->user()->isDirty('email')) {
                \Log::info('E-Mail wurde geändert', ['alte_email' => $request->user()->getOriginal('email'), 'neue_email' => $request->user()->email]);
                $request->user()->email_verified_at = null;
            }

            $request->user()->save();

            \Log::info('Daten nach dem Speichern', $request->user()->toArray());

            return Redirect::route('profile.edit')->with('status', 'profile-updated');
        } catch (\Exception $e) {
            \Log::error('Fehler beim Aktualisieren des Profils: ' . $e->getMessage());
            return Redirect::route('profile.edit')->withErrors(['update_error' => 'Das Profil konnte nicht aktualisiert werden.']);
        }
    }

    /**
     * Aktualisiert das Passwort des Benutzers.
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = $request->user();
        $user->password = Hash::make($request->password);
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'password-updated');
    }

    /**
     * Löscht das Benutzerkonto.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        \Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Aktualisiert das Profilbild des Benutzers.
     */
    public function updateImage(Request $request): RedirectResponse
    {
        $request->validate([
            'profile_image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $user = $request->user();

        if ($request->hasFile('profile_image')) {
            try {
                $path = $request->file('profile_image')->store('profile_images', 'public');
                $user->profile_image = $path;
                $user->save();
            } catch (\Exception $e) {
                \Log::error('Fehler beim Speichern des Profilbilds: ' . $e->getMessage());
                return Redirect::route('profile.edit')->withErrors(['profile_image' => 'Das Bild konnte nicht gespeichert werden.']);
            }
        }

        return Redirect::route('profile.edit')->with('status', 'profile-image-updated');
    }
}

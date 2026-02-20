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
     * Suche nach Nutzernamen.
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
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
            'posts' => $request->user()->posts()->latest()->get(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->only(['bio', 'location', 'website', 'twitter', 'instagram']));

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Update the user's password.
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
     * Delete the user's account.
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
     * Update the user's profile image.
     */
    public function updateImage(Request $request): RedirectResponse
    {
        $request->validate([
            'profile_image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $user = $request->user();

        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('profile_images', 'public');
            $user->profile_image = $path;
            $user->save();
        }

        return Redirect::route('profile.edit')->with('status', 'profile-image-updated');
    }
}

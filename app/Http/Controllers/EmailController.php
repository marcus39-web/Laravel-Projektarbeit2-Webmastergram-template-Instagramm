<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     * Show the form for creating a new email.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('posts.email_form');
    }

    /**
     * Send an email.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Mail::raw($validated['message'], function ($message) use ($validated) {
            $message->to($validated['email'])
                    ->subject($validated['subject']);
        });

        return redirect()->route('send.email.form')->with('success', 'E-Mail wurde erfolgreich gesendet!');
    }
}
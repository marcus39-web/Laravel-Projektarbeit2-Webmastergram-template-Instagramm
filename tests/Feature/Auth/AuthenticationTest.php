<?php

use App\Models\User;

test('Login-Seite kann angezeigt werden', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});

test('Benutzer können sich über die Login-Seite authentifizieren', function () {
    $user = User::factory()->create();

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));
});

test('Benutzer können sich mit ungültigem Passwort nicht anmelden', function () {
    $user = User::factory()->create();

    $this->post('/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});

test('Benutzer können sich abmelden', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/logout');

    $this->assertGuest();
    $response->assertRedirect('/');
});

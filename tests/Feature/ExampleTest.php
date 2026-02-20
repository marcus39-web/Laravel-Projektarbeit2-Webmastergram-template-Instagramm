<?php

// Test: Startseite gibt erfolgreiche Antwort zurück
it('returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

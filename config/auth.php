<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Standardwerte für Authentifizierung
    |--------------------------------------------------------------------------
    |
    | Diese Option legt den Standard-Authentifizierungs-"Guard" und den
    | Passwort-Reset-"Broker" für deine Anwendung fest. Du kannst diese Werte
    | nach Bedarf ändern, aber sie sind ein guter Start für die meisten Anwendungen.
    |
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentifizierungs-Guards
    |--------------------------------------------------------------------------
    |
    | Hier kannst du alle Authentifizierungs-Guards für deine Anwendung definieren.
    | Eine sinnvolle Standardkonfiguration ist bereits vorhanden, die Session-Storage
    | und den Eloquent User Provider nutzt.
    |
    | Jeder Guard hat einen User Provider, der festlegt, wie Benutzer aus der Datenbank
    | oder einem anderen Speicher geladen werden. Standardmäßig wird Eloquent verwendet.
    |
    | Unterstützt: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Provider
    |--------------------------------------------------------------------------
    |
    | Jeder Authentifizierungs-Guard hat einen User Provider, der festlegt, wie
    | Benutzer aus der Datenbank oder einem anderen Speicher geladen werden.
    | Standardmäßig wird Eloquent verwendet.
    |
    | Wenn du mehrere User-Tabellen oder -Modelle hast, kannst du mehrere Provider
    | konfigurieren. Diese Provider können dann beliebigen Guards zugewiesen werden.
    |
    | Unterstützt: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', App\Models\User::class),
        ],

        // Beispiel für einen User-Provider mit Datenbank:
        // 'users' => [
        //     'driver' => 'database', // Nutzt die Datenbank direkt
        //     'table' => 'users',     // Tabelle für Benutzer
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Passwort-Zurücksetzen
    |--------------------------------------------------------------------------
    |
    | Diese Konfigurationsoptionen bestimmen das Verhalten der Passwort-
    | Zurücksetzen-Funktionalität von Laravel, einschließlich der Tabelle
    | für die Token-Speicherung und des User Providers, der zum Abrufen
    | der Benutzer verwendet wird.
    |
    | Die Ablaufzeit gibt an, wie viele Minuten ein Reset-Token gültig ist.
    | Diese Sicherheitsfunktion sorgt dafür, dass Tokens nur kurz gültig sind
    | und weniger Zeit zum Erraten bleibt. Du kannst diesen Wert anpassen.
    |
    | Die Throttle-Einstellung gibt an, wie viele Sekunden ein Benutzer warten
    | muss, bevor er weitere Reset-Tokens generieren kann. Das verhindert, dass
    | ein Benutzer sehr viele Tokens in kurzer Zeit erzeugt.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Timeout für Passwort-Bestätigung
    |--------------------------------------------------------------------------
    |
    | Hier kannst du festlegen, nach wie vielen Sekunden die Passwort-Bestätigung
    | abläuft und Benutzer ihr Passwort erneut eingeben müssen. Standardmäßig
    | beträgt das Timeout drei Stunden.
    |
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];

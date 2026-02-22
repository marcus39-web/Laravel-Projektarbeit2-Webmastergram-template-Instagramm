<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Name der Anwendung
    |--------------------------------------------------------------------------
    |
    | Dieser Wert ist der Name deiner Anwendung. Er wird verwendet, wenn das
    | Framework den Namen der Anwendung in einer Benachrichtigung oder
    | anderen UI-Elementen anzeigen muss.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Anwendungsumgebung
    |--------------------------------------------------------------------------
    |
    | Dieser Wert bestimmt, in welcher "Umgebung" deine Anwendung aktuell läuft.
    | Dies kann beeinflussen, wie verschiedene Dienste konfiguriert werden.
    | Setze diesen Wert in deiner ".env"-Datei.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Debug-Modus der Anwendung
    |--------------------------------------------------------------------------
    |
    | Wenn deine Anwendung im Debug-Modus läuft, werden detaillierte Fehlermeldungen
    | mit Stacktraces bei jedem Fehler angezeigt. Ist der Debug-Modus deaktiviert,
    | wird eine einfache generische Fehlerseite angezeigt.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | URL der Anwendung
    |--------------------------------------------------------------------------
    |
    | Diese URL wird von der Konsole verwendet, um beim Einsatz von Artisan
    | Befehlen korrekte URLs zu generieren. Setze sie auf das Root-Verzeichnis
    | deiner Anwendung, damit sie in Artisan-Befehlen verfügbar ist.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Zeitzone der Anwendung
    |--------------------------------------------------------------------------
    |
    | Hier kannst du die Standardzeitzone für deine Anwendung festlegen.
    | Diese wird von den PHP-Datumsfunktionen verwendet. Standard ist "UTC",
    | was für die meisten Anwendungsfälle geeignet ist.
    |
    */

    'timezone' => env('APP_TIMEZONE', 'UTC'),

    /*
    |--------------------------------------------------------------------------
    | Spracheinstellungen der Anwendung
    |--------------------------------------------------------------------------
    |
    | Die Anwendungssprache bestimmt die Standardsprache, die von Laravels
    | Übersetzungs- und Lokalisierungsmethoden verwendet wird. Dieser Wert
    | kann auf jede Sprache gesetzt werden, für die Übersetzungen vorliegen.
    |
    */

    'locale' => env('APP_LOCALE', 'en'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    |--------------------------------------------------------------------------
    | Verschlüsselungs-Schlüssel
    |--------------------------------------------------------------------------
    |
    | Dieser Schlüssel wird von Laravels Verschlüsselungsdiensten verwendet
    | und sollte auf eine zufällige, 32 Zeichen lange Zeichenkette gesetzt
    | werden, um die Sicherheit aller verschlüsselten Werte zu gewährleisten.
    | Setze diesen Wert vor dem Deployment der Anwendung.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Treiber für den Wartungsmodus
    |--------------------------------------------------------------------------
    |
    | Diese Optionen bestimmen, welcher Treiber für den Wartungsmodus von
    | Laravel verwendet wird. Der "cache"-Treiber ermöglicht die Steuerung
    | des Wartungsmodus über mehrere Server hinweg.
    |
    | Unterstützte Treiber: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];

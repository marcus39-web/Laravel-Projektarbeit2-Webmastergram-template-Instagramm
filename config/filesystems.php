<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Standard-Dateisystem-Disk
    |--------------------------------------------------------------------------
    |
    | Hier kannst du das Standard-Dateisystem-"Disk" festlegen, das vom Framework
    | verwendet werden soll. Die "local"-Disk sowie verschiedene Cloud-Disks stehen
    | für die Dateispeicherung zur Verfügung.
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Dateisystem-Disks
    |--------------------------------------------------------------------------
    |
    | Hier kannst du beliebig viele Dateisystem-Disks konfigurieren und sogar
    | mehrere Disks für denselben Treiber anlegen. Beispiele für die meisten
    | unterstützten Treiber sind hier als Referenz aufgeführt.
    |
    | Unterstützte Treiber: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app/private'),
            'serve' => true,
            'throw' => false,
            'report' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
            'report' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolische Links
    |--------------------------------------------------------------------------
    |
    | Hier kannst du die symbolischen Links konfigurieren, die erstellt werden,
    | wenn der Artisan-Befehl `storage:link` ausgeführt wird. Die Array-Keys sollten
    | die Speicherorte der Links und die Werte deren Zielpfade sein.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];

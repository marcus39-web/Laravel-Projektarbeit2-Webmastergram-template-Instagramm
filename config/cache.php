<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Standard-Cache-Store
    |--------------------------------------------------------------------------
    |
    | Diese Option legt fest, welcher Cache-Store standardmäßig vom Framework
    | verwendet wird. Diese Verbindung wird genutzt, wenn bei einer Cache-Operation
    | keine andere explizit angegeben wird.
    |
    */

    'default' => env('CACHE_STORE', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Cache-Stores
    |--------------------------------------------------------------------------
    |
    | Hier kannst du alle Cache-"Stores" für deine Anwendung sowie deren Treiber
    | definieren. Du kannst sogar mehrere Stores für denselben Treiber anlegen,
    | um verschiedene Arten von Daten zu gruppieren.
    |
    | Unterstützte Treiber: "array", "database", "file", "memcached",
    |                      "redis", "dynamodb", "octane", "null"
    |
    */

    'stores' => [

        'array' => [
            'driver' => 'array',
            'serialize' => false,
        ],

        'database' => [
            'driver' => 'database',
            'connection' => env('DB_CACHE_CONNECTION'),
            'table' => env('DB_CACHE_TABLE', 'cache'),
            'lock_connection' => env('DB_CACHE_LOCK_CONNECTION'),
            'lock_table' => env('DB_CACHE_LOCK_TABLE'),
        ],

        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/cache/data'),
            'lock_path' => storage_path('framework/cache/data'),
        ],

        'memcached' => [
            'driver' => 'memcached',
            'persistent_id' => env('MEMCACHED_PERSISTENT_ID'),
            'sasl' => [
                env('MEMCACHED_USERNAME'),
                env('MEMCACHED_PASSWORD'),
            ],
            'options' => [
                // Memcached::OPT_CONNECT_TIMEOUT => 2000, // Verbindungs-Timeout in Millisekunden
            ],
            'servers' => [
                [
                    'host' => env('MEMCACHED_HOST', '127.0.0.1'),
                    'port' => env('MEMCACHED_PORT', 11211),
                    'weight' => 100,
                ],
            ],
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => env('REDIS_CACHE_CONNECTION', 'cache'),
            'lock_connection' => env('REDIS_CACHE_LOCK_CONNECTION', 'default'),
        ],

        'dynamodb' => [
            'driver' => 'dynamodb',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'table' => env('DYNAMODB_CACHE_TABLE', 'cache'),
            'endpoint' => env('DYNAMODB_ENDPOINT'),
        ],

        'octane' => [
            'driver' => 'octane',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Präfix für Cache-Keys
    |--------------------------------------------------------------------------
    |
    | Wenn du APC, Datenbank, Memcached, Redis oder DynamoDB als Cache verwendest,
    | kann es sein, dass andere Anwendungen denselben Cache nutzen. Daher kannst du
    | jedem Cache-Key ein Präfix voranstellen, um Kollisionen zu vermeiden.
    |
    */

    'prefix' => env('CACHE_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_cache_'),

];

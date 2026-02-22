<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Standard-Mailer
    |--------------------------------------------------------------------------
    |
    | Diese Option legt fest, welcher Mailer standardmäßig zum Versenden aller
    | E-Mails verwendet wird, sofern beim Versand nicht explizit ein anderer
    | Mailer angegeben wird. Weitere Mailer können im "mailers"-Array konfiguriert
    | werden. Beispiele für jeden Typ sind vorhanden.
    |
    */

    'default' => env('MAIL_MAILER', 'log'),

    /*
    |--------------------------------------------------------------------------
    | Mailer-Konfigurationen
    |--------------------------------------------------------------------------
    |
    | Hier kannst du alle Mailer und deren Einstellungen für deine Anwendung
    | konfigurieren. Es sind bereits mehrere Beispiele vorkonfiguriert, du kannst
    | aber beliebig eigene hinzufügen.
    |
    | Laravel unterstützt verschiedene Mail-"Transport"-Treiber, die beim Versand
    | von E-Mails verwendet werden können. Du kannst unten festlegen, welcher für
    | deine Mailer genutzt wird. Weitere Mailer können bei Bedarf ergänzt werden.
    |
    | Unterstützt: "smtp", "sendmail", "mailgun", "ses", "ses-v2",
    |              "postmark", "resend", "log", "array",
    |              "failover", "roundrobin"
    |
    */

    'mailers' => [

        'smtp' => [
            'transport' => 'smtp',
            'scheme' => env('MAIL_SCHEME'),
            'url' => env('MAIL_URL'),
            'host' => env('MAIL_HOST', '127.0.0.1'),
            'port' => env('MAIL_PORT', 2525),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN', parse_url(env('APP_URL', 'http://localhost'), PHP_URL_HOST)),
        ],

        'ses' => [
            'transport' => 'ses',
        ],

        'postmark' => [
            'transport' => 'postmark',
            // 'message_stream_id' => env('POSTMARK_MESSAGE_STREAM_ID'), // Optional: ID des Message Streams
            // 'client' => [
            //     'timeout' => 5, // Timeout für HTTP-Client in Sekunden
            // ],
        ],

        'resend' => [
            'transport' => 'resend',
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        'failover' => [
            'transport' => 'failover',
            'mailers' => [
                'smtp',
                'log',
            ],
        ],

        'roundrobin' => [
            'transport' => 'roundrobin',
            'mailers' => [
                'ses',
                'postmark',
            ],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Globale "From"-Adresse
    |--------------------------------------------------------------------------
    |
    | Du kannst festlegen, dass alle von deiner Anwendung gesendeten E-Mails
    | von derselben Adresse verschickt werden. Hier kannst du einen Namen und
    | eine Adresse angeben, die global für alle E-Mails deiner Anwendung verwendet werden.
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],

];

<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Standard-Session-Treiber
    |--------------------------------------------------------------------------
    |
    | Diese Option legt fest, welcher Session-Treiber standardmäßig für eingehende
    | Requests verwendet wird. Laravel unterstützt verschiedene Speicheroptionen
    | für Sitzungsdaten. Die Speicherung in der Datenbank ist eine gute Wahl.
    |
    | Unterstützt: "file", "cookie", "database", "apc",
    |              "memcached", "redis", "dynamodb", "array"
    |
    */

    'driver' => env('SESSION_DRIVER', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Lebensdauer der Session
    |--------------------------------------------------------------------------
    |
    | Hier kannst du angeben, wie viele Minuten eine Session inaktiv bleiben darf,
    | bevor sie abläuft. Wenn die Session sofort beim Schließen des Browsers ablaufen
    | soll, kannst du dies über die Option expire_on_close einstellen.
    |
    */

    'lifetime' => (int) env('SESSION_LIFETIME', 120),

    'expire_on_close' => env('SESSION_EXPIRE_ON_CLOSE', false),

    /*
    |--------------------------------------------------------------------------
    | Session-Verschlüsselung
    |--------------------------------------------------------------------------
    |
    | Mit dieser Option kannst du festlegen, dass alle Sitzungsdaten vor dem Speichern
    | verschlüsselt werden. Die Verschlüsselung erfolgt automatisch durch Laravel und
    | du kannst die Session wie gewohnt nutzen.
    |
    */

    'encrypt' => env('SESSION_ENCRYPT', false),

    /*
    |--------------------------------------------------------------------------
    | Speicherort für Session-Dateien
    |--------------------------------------------------------------------------
    |
    | Wenn du den "file"-Session-Treiber verwendest, werden die Sitzungsdateien
    | auf der Festplatte abgelegt. Der Standard-Speicherort ist hier definiert;
    | du kannst aber auch einen anderen Ort angeben.
    |
    */

    'files' => storage_path('framework/sessions'),

    /*
    |--------------------------------------------------------------------------
    | Session-Datenbankverbindung
    |--------------------------------------------------------------------------
    |
    | Wenn du den "database"- oder "redis"-Session-Treiber verwendest, kannst du
    | hier die Verbindung angeben, die für die Verwaltung dieser Sessions genutzt werden soll.
    | Dies sollte einer Verbindung in deinen Datenbank-Konfigurationsoptionen entsprechen.
    |
    */

    'connection' => env('SESSION_CONNECTION'),

    /*
    |--------------------------------------------------------------------------
    | Session-Datenbanktabelle
    |--------------------------------------------------------------------------
    |
    | Wenn du den "database"-Session-Treiber verwendest, kannst du die Tabelle angeben,
    | in der die Sessions gespeichert werden. Ein sinnvoller Standard ist bereits definiert,
    | du kannst dies aber auf eine andere Tabelle ändern.
    |
    */

    'table' => env('SESSION_TABLE', 'sessions'),

    /*
    |--------------------------------------------------------------------------
    | Session-Cache-Store
    |--------------------------------------------------------------------------
    |
    | Wenn du einen der Cache-basierten Session-Backends des Frameworks verwendest,
    | kannst du hier den Cache-Store angeben, der zur Speicherung der Session-Daten
    | zwischen den Requests genutzt werden soll. Dies muss einem deiner definierten Cache-Stores entsprechen.
    |
    | Betroffen: "apc", "dynamodb", "memcached", "redis"
    |
    */

    'store' => env('SESSION_STORE'),

    /*
    |--------------------------------------------------------------------------
    | Session-Sweeping-Lotterie
    |--------------------------------------------------------------------------
    |
    | Einige Session-Treiber müssen ihren Speicherort manuell bereinigen, um alte Sessions zu entfernen.
    | Hier kannst du die Wahrscheinlichkeit angeben, mit der dies bei einem Request passiert.
    | Standardmäßig liegt die Chance bei 2 von 100.
    |
    */

    'lottery' => [2, 100],

    /*
    |--------------------------------------------------------------------------
    | Name des Session-Cookies
    |--------------------------------------------------------------------------
    |
    | Hier kannst du den Namen des Session-Cookies ändern, das vom Framework erstellt wird.
    | In der Regel ist es nicht notwendig, diesen Wert zu ändern, da dies keinen
    | nennenswerten Sicherheitsvorteil bringt.
    |
    */

    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug(env('APP_NAME', 'laravel'), '_').'_session'
    ),

    /*
    |--------------------------------------------------------------------------
    | Pfad des Session-Cookies
    |--------------------------------------------------------------------------
    |
    | Der Pfad des Session-Cookies bestimmt, für welchen Pfad das Cookie verfügbar ist.
    | In der Regel ist dies der Root-Pfad deiner Anwendung, du kannst dies aber bei Bedarf anpassen.
    |
    */

    'path' => env('SESSION_PATH', '/'),

    /*
    |--------------------------------------------------------------------------
    | Domain des Session-Cookies
    |--------------------------------------------------------------------------
    |
    | Dieser Wert bestimmt die Domain und Subdomains, für die das Session-Cookie verfügbar ist.
    | Standardmäßig ist das Cookie für die Root-Domain und alle Subdomains verfügbar. In der Regel
    | sollte dies nicht geändert werden.
    |
    */

    'domain' => env('SESSION_DOMAIN'),

    /*
    |--------------------------------------------------------------------------
    | Nur-HTTPS-Cookies
    |--------------------------------------------------------------------------
    |
    | Wenn du diese Option auf true setzt, werden Session-Cookies nur dann an den Server gesendet,
    | wenn der Browser eine HTTPS-Verbindung hat. Dadurch wird verhindert, dass das Cookie
    | ungesichert übertragen wird.
    |
    */

    'secure' => env('SESSION_SECURE_COOKIE'),

    /*
    |--------------------------------------------------------------------------
    | Nur HTTP-Zugriff
    |--------------------------------------------------------------------------
    |
    | Wenn du diesen Wert auf true setzt, wird verhindert, dass JavaScript auf den Wert des Cookies zugreifen kann.
    | Das Cookie ist dann nur über das HTTP-Protokoll zugänglich. Es ist unwahrscheinlich, dass du diese Option deaktivieren solltest.
    |
    */

    'http_only' => env('SESSION_HTTP_ONLY', true),

    /*
    |--------------------------------------------------------------------------
    | Same-Site-Cookies
    |--------------------------------------------------------------------------
    |
    | Diese Option bestimmt, wie sich deine Cookies bei Cross-Site-Requests verhalten
    | und kann genutzt werden, um CSRF-Angriffe zu verhindern. Standardmäßig ist der Wert
    | auf "lax" gesetzt, um sichere Cross-Site-Requests zu erlauben.
    |
    | Siehe: https://developer.mozilla.org/de/docs/Web/HTTP/Headers/Set-Cookie#samesitesamesite-value
    |
    | Unterstützt: "lax", "strict", "none", null
    |
    */

    'same_site' => env('SESSION_SAME_SITE', 'lax'),

    /*
    |--------------------------------------------------------------------------
    | Partitionierte Cookies
    |--------------------------------------------------------------------------
    |
    | Wenn du diesen Wert auf true setzt, wird das Cookie für den Top-Level-Site-Kontext bei Cross-Site-Anfragen gebunden.
    | Partitionierte Cookies werden vom Browser akzeptiert, wenn sie als "secure" markiert sind und das Same-Site-Attribut auf "none" steht.
    |
    */

    'partitioned' => env('SESSION_PARTITIONED_COOKIE', false),

];

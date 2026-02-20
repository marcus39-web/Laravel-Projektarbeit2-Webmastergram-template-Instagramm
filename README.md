# Webmastergram – Instagram-Klon mit Laravel

## Übersicht

Webmastergram ist eine moderne Social-Media-Webanwendung, inspiriert von Instagram, entwickelt mit Laravel, Tailwind CSS und Docker. Nutzer können Profile erstellen, Beiträge posten, liken, folgen, Benachrichtigungen erhalten und andere Nutzer suchen.

---

## Features

- Registrierung & Login (mit Authentifizierung)
- Nutzerprofile mit Profilbild, Username, Follower/Following-Anzeige
- Beiträge (Text & Bild), eigene Timeline
- Likes & Unlikes für Beiträge
- Folgen/Entfolgen von Nutzern
- Benachrichtigungen (z.B. neue Follower)
- Nutzer-Suche mit Filter
- Passwort ändern & Account löschen
- Responsive Design mit Tailwind CSS
- Docker-Unterstützung für einfache Entwicklung

---

## Installation

### Voraussetzungen

- Docker & Docker Compose
- Node.js & npm (für Frontend)
- Git

### Schritte

1. **Repository klonen**

   ```bash
   git clone <dein-repo-link>
   cd laravel-advanced-webmastergram-template-marcus39-web
   ```

2. **Abhängigkeiten installieren**

   ```bash
   npm install
   composer install
   ```

3. **Umgebungsvariablen konfigurieren**
   - Kopiere `.env.example` zu `.env`
   - Passe Datenbank-Zugangsdaten an (MySQL, Docker-Container)

4. **Docker starten**

   ```bash
   ./vendor/bin/sail up
   ```

5. **Migrationen ausführen**

   ```bash
   ./vendor/bin/sail artisan migrate
   ```

6. **Frontend starten**

   ```bash
   npm run dev
   ```

7. **App im Browser öffnen**
   - Standard: [http://localhost](http://localhost)
   - Mailpit: [http://localhoast:8025](http://localhoast:8025)

---

## Projektstruktur

- `app/Http/Controllers/` – Controller für alle Features
- `app/Models/` – Datenbank-Modelle (User, Post, etc.)
- `resources/views/` – Blade-Templates für das UI
- `routes/web.php` – Routing der Anwendung
- `database/migrations/` – Datenbankschema
- `public/` – Einstiegspunkt für Webserver
- `storage/` – Cache, Logs, Uploads

---

## Wichtige Befehle

- **Migrationen:**  
  `./vendor/bin/sail artisan migrate`
- **Seeder:**  
  `./vendor/bin/sail artisan db:seed`
- **Cache leeren:**  
  `./vendor/bin/sail artisan config:clear && ./vendor/bin/sail artisan route:clear && ./vendor/bin/sail artisan view:clear`
- **Tests ausführen:**  
  `./vendor/bin/sail artisan test`

---

## Entwicklungshinweise

- Änderungen an Routen oder Controller erfordern oft ein Leeren des Caches.
- Rechte für `storage/` und `bootstrap/cache` müssen korrekt gesetzt sein (`chmod -R 775`).
- Docker-Container muss laufen, damit MySQL und Laravel funktionieren.

---

## Codequalität und Best Practices

### Namenskonventionen & Coding-Richtlinien

- Alle Klassen, Methoden und Namespaces folgen den PSR-Standards und Laravel-Konventionen.
- Die Prinzipien von SOLID und DRY werden beachtet: Jede Klasse hat eine klar definierte Aufgabe, wiederverwendbare Methoden werden genutzt und Dopplungen vermieden.

### Vermeidung von N+1-Problemen und unnötigen Datenbank-Queries

- Eloquent-Relationen werden bei Listenabfragen mit `with()` eager geladen, um N+1-Probleme zu vermeiden (z. B. `Post::with('user')->get()`).
- Bei komplexen oder großen Datenmengen wird auf effiziente Abfragen und Indexnutzung geachtet.
- Unnötige oder doppelte Datenbankabfragen werden vermieden.

### Fehlerbehandlung und Ausfallsicherheit

- Kritische Dateioperationen (z. B. Bild-Uploads) und der Mailversand sind mit try/catch-Blöcken abgesichert. Fehler werden geloggt und dem Nutzer eine verständliche Fehlermeldung angezeigt.
- Beim Hochladen von Bildern (Profilbild, Post-Bild) wird ein Fehler beim Speichern erkannt und als Fehlernachricht im Frontend ausgegeben.
- Beim Versand von Benachrichtigungs-E-Mails werden Fehler abgefangen und ins Log geschrieben.
- Logging aller Fehler mit \Log::error
- Nutzerfreundliche Fehlermeldungen im Frontend

Siehe z. B. die Controller `ProfileController`, `PostController` und den Listener `SendNewFollowerNotification` für die Umsetzung dieser Prinzipien.

## Mitwirken

Pull Requests und Issues sind willkommen!  
Bitte Code sauber halten und deutsche Kommentare für den Ablauf verwenden.

---

## Lizenz

Dieses Projekt steht unter der MIT-Lizenz.

---

## Tree-Struktur

```
laravel-advanced-webmastergram-template-marcus39-web/
├── artisan
├── composer.json
├── docker-compose.yml
├── package.json
├── phpunit.xml
├── postcss.config.js
├── README.md
├── tailwind.config.js
├── vite.config.js
├── app/
│   ├── Http/
│   │   └── Controllers/
│   ├── Models/
│   └── Providers/
├── bootstrap/
│   ├── app.php
│   ├── providers.php
│   └── cache/
├── config/
│   ├── app.php
│   ├── auth.php
│   ├── ...
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── public/
│   ├── index.php
│   └── robots.txt
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
├── routes/
│   ├── console.php
│   └── web.php
├── storage/
│   ├── app/
│   ├── framework/
│   └── logs/
├── tests/
│   ├── Feature/
│   └── Unit/
```

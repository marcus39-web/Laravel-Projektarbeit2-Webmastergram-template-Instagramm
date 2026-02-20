<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Die Datenbank der Anwendung befüllen (seeden).
     */
    public function run(): void
    {
        // User::factory(10)->create(); // Beispiel: 10 Benutzer generieren

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}

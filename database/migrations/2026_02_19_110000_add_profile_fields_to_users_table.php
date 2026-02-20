<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Fügt neue Profilfelder zur Tabelle "users" hinzu.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('bio')->nullable();
            $table->string('location')->nullable();
            $table->string('website')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
        });
    }

    /**
     * Entfernt die hinzugefügten Profilfelder wieder.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['bio', 'location', 'website', 'twitter', 'instagram']);
        });
    }
};

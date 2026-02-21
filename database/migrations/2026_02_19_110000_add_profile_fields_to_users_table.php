<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Fügt neue Profilfelder zur Tabelle "users" hinzu.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'bio')) {
                $table->text('bio')->nullable();
            }
            if (!Schema::hasColumn('users', 'location')) {
                $table->string('location')->nullable();
            }
            if (!Schema::hasColumn('users', 'website')) {
                $table->string('website')->nullable();
            }
            if (!Schema::hasColumn('users', 'twitter')) {
                $table->string('twitter')->nullable();
            }
            if (!Schema::hasColumn('users', 'instagram')) {
                $table->string('instagram')->nullable();
            }
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

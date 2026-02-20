<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Fügt das Bild-Feld zur Tabelle "posts" hinzu.
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('image')->nullable()->after('user_id');
        });
    }

    /**
     * Entfernt das Bild-Feld wieder.
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};

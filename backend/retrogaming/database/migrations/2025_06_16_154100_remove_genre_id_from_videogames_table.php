<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('videogames', function (Blueprint $table) {
            $table->dropForeign(['genre_id']); // Rimuove il vincolo di chiave esterna
            $table->dropColumn('genre_id'); // Rimuove la colonna
        });
    }

    public function down(): void
    {
        Schema::table('videogames', function (Blueprint $table) {
            $table->foreignId('genre_id')->constrained('genres')->onDelete('cascade')->after('producer_id');
        });
    }
};

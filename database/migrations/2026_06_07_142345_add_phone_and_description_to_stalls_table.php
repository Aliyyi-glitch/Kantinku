<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('stalls', function (Blueprint $table) {
            $table->string('phone')->nullable(); // Menambah kolom phone
            $table->text('deskripsi')->nullable(); // Menambah kolom deskripsi
        });
    }

    public function down(): void
    {
        Schema::table('stalls', function (Blueprint $table) {
            $table->dropColumn(['phone', 'deskripsi']);
        });
    }
};

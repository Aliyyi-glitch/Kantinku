<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('stalls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Hubungan ke user/pedagang
            $table->string('name');
            $table->text('description')->nullable(); // Untuk mengubah deskripsi stan
            $table->string('image')->nullable(); // Untuk foto stan

            // 🌟 TAMBAHKAN BARIS INI: Default awal toko adalah 'buka'
            $table->string('status')->default('buka');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stalls');
    }
};
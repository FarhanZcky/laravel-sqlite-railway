<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('halaman')->unique(); // Nama halaman, harus unik
            $table->string('judul');
            $table->text('isi');
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Urungkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};

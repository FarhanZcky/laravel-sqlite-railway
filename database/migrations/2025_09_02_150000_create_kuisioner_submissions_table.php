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
        Schema::create('kuisioner_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nim');
            $table->string('prodi');
            $table->integer('tahun_masuk');
            $table->integer('tahun_lulus');
            $table->string('telepon');
            $table->text('alamat');
            $table->string('jenis_pekerjaan')->nullable();
            $table->string('perusahaan')->nullable();
            $table->string('jabatan')->nullable();
            $table->integer('lama_bekerja')->nullable();
            $table->string('relevansi')->nullable();
            $table->string('waktu_tunggu');
            $table->string('kepuasan');
            $table->text('saran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Urungkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuisioner_submissions');
    }
};
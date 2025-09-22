<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Konten;

class KontenSeeder extends Seeder
{
    public function run(): void
    {
        Konten::create([ // Perbaikan di sini
            'halaman' => 'beranda',
            'judul' => 'Selamat Datang di Tracer Study FKOMINFO',
            'isi' => 'Website resmi tracer study untuk pemantauan karier alumni.'
        ]);

        Konten::create([ // Perbaikan di sini
            'halaman' => 'profil',
            'judul' => 'Profil FKOMINFO',
            'isi' => 'Fakultas Komunikasi dan Informasi Universitas Garut ...'
        ]);
    }
}
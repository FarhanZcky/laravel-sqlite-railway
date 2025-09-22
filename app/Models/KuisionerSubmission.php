<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuisionerSubmission extends Model
{
    use HasFactory;

    // Nama tabel yang terhubung dengan model ini.
    protected $table = 'kuisioner_submissions';

    // Kolom-kolom yang dapat diisi secara massal (mass assignable).
    // Penting untuk mencegah kerentanan keamanan.
    protected $fillable = [
        'nama',
        'email', // Anda perlu tambahkan kolom email di tabel migrasi jika belum ada.
        'prodi',
        'nim',
        'tahun_masuk',
        'tahun_lulus',
        'telepon',
        'alamat',
        'jenis_pekerjaan',
        'perusahaan',
        'jabatan',
        'lama_bekerja',
        'relevansi',
        'waktu_tunggu',
        'kepuasan',
        'saran',
    ];
}

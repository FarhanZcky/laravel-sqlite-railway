<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuisioner extends Model
{
    use HasFactory;

    protected $table = 'kuisioner'; // nama tabel di database
    protected $fillable = [
        'prodi',
        'waktu_tunggu',
        'kepuasan',
        // tambahkan field lain kalau ada
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model untuk merepresentasikan data konten halaman.
 * Asumsikan tabel database Anda bernama 'contents' dengan kolom 'halaman', 'judul', dan 'isi'.
 */
class Content extends Model
{
    use HasFactory;

    protected $fillable = ['halaman', 'judul', 'isi'];
}

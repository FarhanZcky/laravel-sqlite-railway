<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Parsedown; // Import pustaka Parsedown

class HalamanController extends Controller
{
    /**
     * Menampilkan konten halaman dinamis dari database.
     */
    public function tampilkanHalaman($halaman)
    {
        // Cari konten berdasarkan nama halaman. Jika tidak ada, kembalikan null.
        $konten = Content::where('halaman', $halaman)->first();
        
        // Memproses isi konten dengan Markdown jika ada
        if ($konten) {
            $parsedown = new Parsedown();
            $konten->isi = $parsedown->text($konten->isi);
        }

        return view($halaman, compact('konten'));
    }
}

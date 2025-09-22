<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin'); // resources/views/admin.blade.php
    }

    /**
     * Tampilkan form untuk mengedit konten halaman.
     */
    public function editKonten($halaman)
    {
        // Cari konten yang sudah ada, atau buat yang baru jika tidak ditemukan.
        $konten = Content::firstOrNew(['halaman' => $halaman]);

        return view('admin.editkonten', compact('konten'));
    }

    /**
     * Simpan perubahan pada konten halaman.
     */
    public function updateKonten(Request $request, $halaman)
    {
        // Validasi data yang masuk
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);
        
        $konten = Content::firstOrNew(['halaman' => $halaman]);
        $konten->judul = $request->judul;
        $konten->isi = $request->isi;
        $konten->save();

        return redirect()->back()->with('success', 'Konten berhasil diperbarui!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\KuisionerSubmission;

class KuisionerController extends Controller
{
    /**
     * Tampilkan halaman kuisioner.
     */
    public function index()
    {
        return view('kuisioner');
    }

    /**
     * Simpan data kuisioner ke database.
     */
    public function submit(Request $request)
    {
        // Validasi semua field yang diperlukan
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50',
            'prodi' => 'required|string',
            'tahun_masuk' => 'required|integer',
            'tahun_lulus' => 'required|integer',
            'telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
            'jenis_pekerjaan' => 'nullable|string',
            'perusahaan' => 'nullable|string',
            'jabatan' => 'nullable|string',
            'lama_bekerja' => 'nullable|integer',
            'relevansi' => 'nullable|string',
            'waktu_tunggu' => 'required|string',
            'kepuasan' => 'required|string',
            'saran' => 'nullable|string',
        ]);

        // Simpan data menggunakan mass assignment
        KuisionerSubmission::create($request->all());

        return redirect()->route('kuisioner')->with('success', 'Terima kasih, data kuisioner berhasil disimpan!');
    }

    /**
     * Tampilkan halaman statistik.
     */
public function statistik(Request $request)
{
    $prodi = $request->get('prodi');
    $tahun = $request->get('tahun_lulus');

    // Query dasar
    $baseQuery = KuisionerSubmission::query();

    if ($prodi) {
        $baseQuery->where('prodi', $prodi);
    }
    if ($tahun) {
        $baseQuery->where('tahun_lulus', $tahun);
    }

    // Clone untuk tiap chart
    $prodiCounts = (clone $baseQuery)
        ->select('prodi', DB::raw('count(*) as total'))
        ->groupBy('prodi')
        ->pluck('total', 'prodi')
        ->toArray();

    $waktuTungguCounts = (clone $baseQuery)
        ->select('waktu_tunggu', DB::raw('count(*) as total'))
        ->groupBy('waktu_tunggu')
        ->pluck('total', 'waktu_tunggu')
        ->toArray();

    $kepuasanCounts = (clone $baseQuery)
        ->select('kepuasan', DB::raw('count(*) as total'))
        ->groupBy('kepuasan')
        ->pluck('total', 'kepuasan')
        ->toArray();

    // Data untuk dropdown
    $allProdi = KuisionerSubmission::select('prodi')->distinct()->pluck('prodi');
    $allTahun = KuisionerSubmission::select('tahun_lulus')->distinct()->pluck('tahun_lulus');

    // Fallback kalau kosong
    if (empty($prodiCounts)) $prodiCounts = ['Tidak ada data' => 0];
    if (empty($waktuTungguCounts)) $waktuTungguCounts = ['Tidak ada data' => 0];
    if (empty($kepuasanCounts)) $kepuasanCounts = ['Tidak ada data' => 0];

    return view('admin.statistik', compact(
        'prodiCounts',
        'waktuTungguCounts',
        'kepuasanCounts',
        'allProdi',
        'allTahun',
        'prodi',
        'tahun'
    ));
}
}
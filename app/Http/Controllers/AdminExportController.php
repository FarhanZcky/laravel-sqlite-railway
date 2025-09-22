<?php

namespace App\Http\Controllers;

use App\Models\KuisionerSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AdminExportController extends Controller
{
    /**
     * Mengekspor data kuesioner ke format CSV.
     */
    public function export()
    {
        // Ambil semua data dari model KuisionerSubmission
        $submissions = KuisionerSubmission::all();

        // Jika tidak ada data, kembalikan dengan pesan error
        if ($submissions->isEmpty()) {
            return redirect()->route('admin.dashboard')->with('error', 'Tidak ada data untuk diekspor.');
        }

        // Tentukan header untuk file CSV
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="data_kuisioner.csv"',
        ];

        // Buat file CSV
        $callback = function() use ($submissions) {
            $file = fopen('php://output', 'w');

            // Tambahkan header kolom ke file CSV
            fputcsv($file, array_keys($submissions->first()->toArray()));

            // Tambahkan setiap baris data ke file CSV
            foreach ($submissions as $row) {
                fputcsv($file, $row->toArray());
            }

            fclose($file);
        };

        // Kembalikan respons yang dapat diunduh
        return Response::stream($callback, 200, $headers);
    }
}

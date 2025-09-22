<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Statistik Alumni - Tracer Study FKOMINFO</title>
@vite('resources/css/app.css')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #ff03c0, #6a0dad);
        color: white;
        margin: 0; padding: 0;
    }
    .card {
        background: rgba(255,255,255,0.1);
        padding: 25px;
        border-radius: 15px;
        backdrop-filter: blur(8px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        color: white;
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.4);
    }
    canvas {
        height: 300px !important;
    }
    .filters {
        display: flex;
        gap: 1rem;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }
    select {
        padding: 8px 12px;
        border-radius: 8px;
        border: none;
        background-color: rgba(255,255,255,0.2);
        color: white;
    }
    option {
        color: black; /* biar pilihan dropdown terlihat */
    }
</style>
</head>
<body>
<div class="container mx-auto max-w-7xl px-4 py-10">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold">📊 Statistik Alumni</h2>
        <a href="{{ route('admin.dashboard') }}" class="text-white hover:text-gray-200">Kembali ke Dashboard</a>
    </div>

    <!-- Dropdown Filter -->
<form method="GET" action="{{ route('admin.statistik') }}" class="mb-6 flex gap-4">
  <select name="prodi" 
    class="bg-white text-black border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-purple-500">
        <option value="">Semua Prodi</option>
        @foreach($allProdi as $p)
            <option value="{{ $p }}" {{ $prodi == $p ? 'selected' : '' }}>{{ $p }}</option>
        @endforeach
    </select>

    <select name="tahun_lulus" 
    class="bg-white text-black border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-purple-500">
        <option value="">Semua Tahun</option>
        @foreach($allTahun as $t)
            <option value="{{ $t }}" {{ $tahun == $t ? 'selected' : '' }}>{{ $t }}</option>
        @endforeach
    </select>

    <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded">Cari</button>
</form>

    <!-- Grid Chart -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="card">
            <h3 class="text-xl font-semibold mb-4 text-center">Jumlah Alumni per Program Studi</h3>
            <canvas id="prodiChart"></canvas>
        </div>

        <div class="card">
            <h3 class="text-xl font-semibold mb-4 text-center">Waktu Tunggu Mendapatkan Pekerjaan</h3>
            <canvas id="waktuTungguChart"></canvas>
        </div>

        <div class="card">
            <h3 class="text-xl font-semibold mb-4 text-center">Tingkat Kesesuaian Dengan Prodi</h3>
            <canvas id="kepuasanChart"></canvas>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Data dari database
    const prodiData = @json($prodiCounts ?? []);
    const waktuTungguData = @json($waktuTungguCounts ?? []);
    const kepuasanData = @json($kepuasanCounts ?? []);

    function createGradient(ctx, colorStart, colorEnd) {
        const gradient = ctx.createLinearGradient(0, 0, 0, 300);
        gradient.addColorStop(0, colorStart);
        gradient.addColorStop(1, colorEnd);
        return gradient;
    }

    // Chart Prodi -> BAR
   // Chart Prodi -> BAR
const ctxProdi = document.getElementById('prodiChart').getContext('2d');

// Mapping warna untuk tiap Prodi
const prodiColors = {
    'Rekayasa Perangkat Lunak': '#800080', // ungu
    'Teknologi Informasi': '#0000ff',      // biru
    'Ilmu Komunikasi': '#ff0000',          // merah
    'Rekayasa Sistem Komputer': '#008000'  // hijau
};

// Ambil label & data
const prodiLabels = Object.keys(prodiData);
const prodiValues = Object.values(prodiData);

// Buat array warna sesuai label
const prodiBgColors = prodiLabels.map(label => prodiColors[label] || '#cccccc'); // default abu-abu

new Chart(ctxProdi, {
    type: 'bar',
    data: {
        labels: prodiLabels,
        datasets: [{
            label: 'Jumlah Alumni',
            data: prodiValues,
            backgroundColor: prodiBgColors
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { labels: { color: 'white' } } },
        scales: {
            x: { ticks: { color: 'white' }, grid: { color: 'rgba(255,255,255,0.2)' } },
            y: { ticks: { color: 'white' }, beginAtZero: true, grid: { color: 'rgba(255,255,255,0.2)' } }
        }
    }
});


    // Chart Waktu Tunggu -> DOUGHNUT
    const ctxWaktu = document.getElementById('waktuTungguChart').getContext('2d');
    new Chart(ctxWaktu, {
        type: 'doughnut',
        data: {
            labels: Object.keys(waktuTungguData),
            datasets: [{
                label: 'Jumlah Alumni',
                data: Object.values(waktuTungguData),
                backgroundColor: ['#36a2eb','#4bc0c0','#9966ff']
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { labels: { color: 'white' } } }
        }
    });

    // Chart Kepuasan/Relevansi -> LINE
    const ctxKepuasan = document.getElementById('kepuasanChart').getContext('2d');
    new Chart(ctxKepuasan, {
        type: 'line',
        data: {
            labels: Object.keys(kepuasanData),
            datasets: [{
                label: 'Jumlah Alumni',
                data: Object.values(kepuasanData),
                borderColor: '#ffce56',
                backgroundColor: '#ffe07f55',
                fill: true,
                tension: 0.3,
                pointBackgroundColor: '#fff',
                pointBorderColor: '#ffce56',
                pointRadius: 5
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { labels: { color: 'white' } } },
            scales: {
                x: { ticks: { color: 'white' }, grid: { color: 'rgba(255,255,255,0.2)' } },
                y: { ticks: { color: 'white' }, beginAtZero: true, grid: { color: 'rgba(255,255,255,0.2)' } }
            }
        }
    });
});
</script>
</body>
</html>

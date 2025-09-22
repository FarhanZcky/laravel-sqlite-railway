<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Konten - Tracer Study FKOMINFO</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #ff03c0, #6a0dad);
            color: white;
            margin: 0;
            padding: 0;
        }

        .card {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 15px;
            backdrop-filter: blur(6px);
            text-align: left;
            margin-bottom: 40px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        .form-control, .form-select {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            border-radius: 8px;
            padding: 10px;
        }
        .form-control::placeholder { color: rgba(255, 255, 255, 0.7); }
        .btn-success { background: #ffd700; color: #4b0082; }
        .btn-secondary { background: rgba(255, 255, 255, 0.2); color: white; }
        .alert-success { background: #28a745; color: white; padding: 15px; border-radius: 8px; margin-bottom: 20px; }
    </style>
</head>
<body>

<div class="container mx-auto p-4 md:p-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold">Edit Konten Halaman: {{ $konten->halaman ?? '' }}</h2>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
    </div>

    @if (session('success'))
        <div class="alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-lg">
        <form action="{{ route('admin.update.konten', ['halaman' => $konten->halaman ?? '']) }}" method="POST">
            @csrf
            @method('PUT')
            
            <input type="hidden" name="halaman" value="{{ $konten->halaman ?? '' }}">

            <div class="mb-4">
                <label for="judul" class="block text-white mb-2">Judul Halaman</label>
                <input type="text" name="judul" id="judul" class="w-full form-control" 
                       placeholder="Masukkan judul halaman" value="{{ old('judul', $konten->judul ?? '') }}">
                @error('judul')
                    <span class="text-red-400 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="isi" class="block text-white mb-2">Isi Konten</label>
                <textarea name="isi" id="isi" rows="10" class="w-full form-control"
                          placeholder="Masukkan isi konten...">{{ old('isi', $konten->isi ?? '') }}</textarea>
                @error('isi')
                    <span class="text-red-400 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="flex justify-end space-x-4">
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<footer>
    <p class="text-center mt-8 text-gray-300">&copy; 2025 FKOMINFO Universitas Garut. All rights reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({ duration: 1200, once: true });
</script>

</body>
</html>

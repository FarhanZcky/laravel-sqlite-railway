<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kuisioner Alumni - Tracer Study FKOMINFO</title>
  @vite('resources/css/app.css') 
  @vite('resources/js/app.js')
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

  <!-- AOS -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #ff03c0, #6a0dad);
      color: white;
      margin: 0;
      padding: 0;
    }
    nav { background: rgba(255, 255, 255, 0.1); }
    .card {
      background: rgba(255,255,255,0.1);
      padding: 30px;
      border-radius: 15px;
      backdrop-filter: blur(6px);
      margin-bottom: 40px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
      color: white;
    }
    .form-control, select, textarea, input { 
      color: black; 
      width: 100%; 
    }
    .btn {
      display: inline-block;
      margin-top: 10px;
      padding: 12px 28px;
      background: #ffd700;
      color: #4b0082;
      font-weight: 600;
      border-radius: 30px;
      text-decoration: none;
      transition: 0.3s;
    }
    .btn:hover { background: #fff; color: #4b0082; }
    footer {
      text-align: center;
      padding: 20px;
      background: rgba(255, 255, 255, 0.1);
      margin-top: 60px;
      font-size: 14px;
    }
  </style>
</head>
<body>

  {{-- Navbar --}}
  <nav class="text-white p-4" style="background-color: #ff03c0;">
    <div class="container mx-auto flex items-center justify-between">
      <div class="flex items-center space-x-2">
        <img src="{{ asset('img/FAKULTAS KOMUNIKASI DAN INFORMASI.png') }}" alt="Logo" class="h-10 w-10">
        <span class="font-bold text-lg">FAKULTAS KOMUNIKASI DAN INFORMASI</span>
      </div>
      <button id="menu-btn" class="md:hidden block focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
      <ul class="hidden md:flex space-x-6 font-medium">
        <li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
        @csrf
    </form>

    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>
</li>

      </ul>
    </div>
    <div id="mobile-menu" class="hidden md:hidden bg-purple-800">
       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
        @csrf
    </form>

    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>
    </div>
  </nav>

  <script>
    const btn = document.getElementById("menu-btn");
    const menu = document.getElementById("mobile-menu");
    btn.addEventListener("click", () => menu.classList.toggle("hidden"));
  </script>

  {{-- Form Kuisioner --}}
  <div class="container mx-auto px-4 py-10">
    <div class="card" data-aos="fade-up">
      <h2 class="text-2xl font-bold mb-6 text-center">📝 Form Kuisioner Alumni</h2>

      <form action="{{ route('kuisioner.submit') }}" method="POST">
        @csrf

        <!-- 1. Data Identitas -->
        <h3 class="text-xl font-semibold mb-3">1. Data Identitas Alumni</h3>
        <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control p-2 rounded mb-3" required>
        <input type="text" name="nim" placeholder="NIM" class="form-control p-2 rounded mb-3" required>
        <select name="prodi" class="form-control p-2 rounded mb-3" required>
          <option value="">-- Pilih Program Studi --</option>
          <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
          <option value="Teknologi Informasi">Teknologi Informasi</option>
          <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
          <option value="Rekayasa Sistem Komputer">Rekayasa Sistem Komputer</option>
        </select>
        <input type="number" name="tahun_masuk" placeholder="Tahun Masuk" class="form-control p-2 rounded mb-3" required>
        <input type="number" name="tahun_lulus" placeholder="Tahun Lulus" class="form-control p-2 rounded mb-6" required>

        <!-- 2. Kontak -->
        <h3 class="text-xl font-semibold mb-3">2. Data Kontak Alumni</h3>
        <input type="text" name="telepon" placeholder="No. Telepon" class="form-control p-2 rounded mb-3" required>
        <textarea name="alamat" placeholder="Alamat" rows="3" class="form-control p-2 rounded mb-6" required></textarea>

        <!-- 3. Riwayat -->
        <h3 class="text-xl font-semibold mb-3">3. Riwayat Pendidikan & Pekerjaan</h3>
        <input type="text" name="jenis_pekerjaan" placeholder="Jenis Pekerjaan" class="form-control p-2 rounded mb-3">
        <input type="text" name="perusahaan" placeholder="Nama Perusahaan/Instansi" class="form-control p-2 rounded mb-3">
        <input type="text" name="jabatan" placeholder="Jabatan" class="form-control p-2 rounded mb-3">
        <input type="number" name="lama_bekerja" placeholder="Lama Bekerja (tahun)" class="form-control p-2 rounded mb-3">
        <select name="relevansi" class="form-control p-2 rounded mb-6">
          <option value="">Relevansi dengan Prodi</option>
          <option value="Tidak Relevan">Tidak Relevan</option>
          <option value="Cukup Relevan">Cukup Relevan</option>
          <option value="Sangat Relevan">Sangat Relevan</option>
        </select>

        <!-- 4. Waktu Tunggu -->
        <h3 class="text-xl font-semibold mb-3">4. Waktu Tunggu Kerja</h3>
        <select name="waktu_tunggu" class="form-control p-2 rounded mb-6" required>
          <option value="<3 bulan">&lt; 3 bulan</option>
          <option value="3-6 bulan">3 - 6 bulan</option>
          <option value="6-12 bulan">6 - 12 bulan</option>
          <option value=">1 tahun">&gt; 1 tahun</option>
        </select>

        <!-- 5. Kepuasan -->
        <h3 class="text-xl font-semibold mb-3">5. Kepuasan & Relevansi Pendidikan</h3>
        <select name="kepuasan" class="form-control p-2 rounded mb-6" required>
          <option value="">Pilih</option>
          <option value="Tidak Relevan">Tidak Relevan</option>
          <option value="Cukup Relevan">Cukup Relevan</option>
          <option value="Sangat Relevan">Sangat Relevan</option>
        </select>

        <!-- 6. Saran -->
        <h3 class="text-xl font-semibold mb-3">6. Saran & Evaluasi</h3>
        <textarea name="saran" placeholder="Masukan terhadap kurikulum, dosen, atau sistem pembelajaran" rows="4" class="form-control p-2 rounded mb-6"></textarea>

        <div class="text-center">
          <button type="submit" class="btn">Kirim Kuisioner</button>
        </div>
      </form>
    </div>
  </div>

  <footer>
    <p>&copy; 2025 FKOMINFO Universitas Garut. All rights reserved.</p>
  </footer>

  <!-- AOS -->
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>AOS.init({ duration: 1200, once: true });</script>
</body>
</html>

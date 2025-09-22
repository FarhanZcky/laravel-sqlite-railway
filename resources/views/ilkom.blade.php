<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ilmu Komunikasi - Tracer Study FKOMINFO</title>
    @vite('resources/css/app.css') 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    {{-- AOS untuk animasi --}}
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel-stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #ff03c0, #6a0dad);
            color: white;
            margin: 0;
            padding: 0;
        }
        nav { background: rgba(255, 255, 255, 0.1); }
        nav .logo { font-size: 22px; font-weight: 700; letter-spacing: 2px; }
        nav ul { list-style: none; display: flex; gap: 25px; }
        nav ul li { position: relative; }
        nav ul li a { text-decoration: none; color: white; font-weight: 500; transition: 0.3s; }
        nav ul li a:hover { color: #ffd700; }
        nav ul li ul { display: none; position: absolute; top: 100%; left: 0; background: white; min-width: 200px; border-radius: 8px; padding: 10px 0; box-shadow: 0 4px 10px rgba(0,0,0,0.2); z-index: 100; }
        nav ul li:hover ul { display: block; }
        nav ul li ul li a { color: #4b0082; padding: 10px 20px; display: block; }
        nav ul li ul li a:hover { background: #f3e8ff; color: #6a0dad; }

        /* Hero */
        .hero {
            min-height: 90vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 100px 20px;
        }
        .hero h1 { font-size: 48px; margin-bottom: 20px; font-weight: 700; }
        .hero p { font-size: 20px; max-width: 700px; margin: auto; line-height: 1.6; }
        .btn {
            margin-top: 30px;
            padding: 12px 30px;
            background: #ffd700;
            color: #4b0082;
            font-weight: 600;
            border-radius: 30px;
            text-decoration: none;
            transition: 0.3s;
        }
        .btn:hover { background: #fff; color: #4b0082; }

        /* Section umum */
        section { padding: 80px 20px; }
        section h2 { font-size: 36px; font-weight: 700; margin-bottom: 20px; text-align: center; }
        section p { font-size: 18px; line-height: 1.6; }

        /* Flex layout konten + gambar */
        .content-box {
            display: flex;
            flex-direction: column;
            gap: 30px;
            align-items: center;
            max-width: 1100px;
            margin: auto;
        }
        .content-box img {
            width: 100%;
            max-width: 450px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        }
        .content-text { flex: 1; }

        @media(min-width: 768px) {
            .content-box { flex-direction: row; }
            .content-box.reverse { flex-direction: row-reverse; }
            .content-text { padding: 0 20px; }
        }

        /* Statistik */
        .stats { display: grid; grid-template-columns: repeat(auto-fit,minmax(200px,1fr)); gap: 20px; margin-top: 40px; }
        .stat-box {
            background: rgba(255,255,255,0.1);
            padding: 30px;
            border-radius: 12px;
            backdrop-filter: blur(6px);
            text-align: center;
        }
        .stat-box h3 { font-size: 36px; margin-bottom: 10px; color: #ffd700; }
        .stat-box p { font-size: 16px; }

        footer {
            text-align: center;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            margin-top: 100px;
            font-size: 14px;
        }
    </style>
</head>
<body>
  {{-- Navbar --}}
<nav class="text-white p-4" style="background-color: #ff03c0;">
  <div class="container mx-auto flex items-center justify-between">
    <!-- Logo -->
    <div class="flex items-center space-x-2">
      <img src="{{ asset('img/FAKULTAS KOMUNIKASI DAN INFORMASI.png') }}" alt="Logo" class="h-10 w-10">
      <span class="font-bold text-lg">FAKULTAS KOMUNIKASI DAN INFORMASI</span>
    </div>

    <!-- Hamburger Button (Mobile) -->
    <button id="menu-btn" class="md:hidden block focus:outline-none">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
           viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>

    <!-- Menu (Desktop) -->
    <ul class="hidden md:flex space-x-6 font-medium">
      <li><a href="/" class="hover:text-gray-200">Beranda</a></li>
      <li class="relative group">
        <button class="hover:text-gray-200">Profil</button>
        <ul class="absolute hidden group-hover:block bg-white text-black mt-2 rounded shadow-lg">
          <li><a href="/visi-misi" class="block px-4 py-2 hover:bg-gray-100">Visi Misi</a></li>
          <li><a href="/sejarah" class="block px-4 py-2 hover:bg-gray-100">Sejarah</a></li>
        </ul>
      </li>
      <li class="relative group">
        <button class="hover:text-gray-200">Program Studi</button>
        <ul class="absolute hidden group-hover:block bg-white text-black mt-2 rounded shadow-lg">
          <li><a href="/ilkom" class="block px-4 py-2 hover:bg-gray-100">Ilmu Komunikasi</a></li>
          <li><a href="/ti" class="block px-4 py-2 hover:bg-gray-100">Teknologi Informasi</a></li>
          <li><a href="/rpl" class="block px-4 py-2 hover:bg-gray-100">Rekayasa Perangkat Lunak</a></li>
          <li><a href="/rsk" class="block px-4 py-2 hover:bg-gray-100">Rekayasa Sistem Komputer</a></li>
        </ul>
      </li>
      <li><a href="{{ url('/login') }}" class="text-white hover:text-gray-300">Login</a></li>
    </ul>
  </div>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="hidden md:hidden bg-purple-800">
    <a href="/" class="block px-4 py-2 hover:bg-purple-600">Beranda</a>
    <div class="border-t border-purple-600"></div>
    <button class="hover:text-gray-200">Profil</button>
    <a href="/visi-misi" class="block px-4 py-2 hover:bg-purple-600">Visi Misi</a>
    <a href="/sejarah" class="block px-4 py-2 hover:bg-purple-600">Sejarah</a>
    <div class="border-t border-purple-600"></div>
    <button class="hover:text-gray-200">Program Studi</button>
    <a href="/ilkom" class="block px-4 py-2 hover:bg-purple-600">Ilmu Komunikasi</a>
    <a href="/ti" class="block px-4 py-2 hover:bg-purple-600">Teknologi Informasi</a>
    <a href="/rpl" class="block px-4 py-2 hover:bg-purple-600">Rekayasa Perangkat Lunak</a>
    <a href="/rsk" class="block px-4 py-2 hover:bg-purple-600">Rekayasa Sistem Komputer</a>
    <div class="border-t border-purple-600"></div>
    <a href="{{ url('/login') }}" class="block px-4 py-2 hover:bg-purple-600">Login</a>
  </div>
</nav>

<script>
  const btn = document.getElementById("menu-btn");
  const menu = document.getElementById("mobile-menu");

  btn.addEventListener("click", () => {
    menu.classList.toggle("hidden");
  });
</script>
<section>
  <h2 data-aos="fade-up">
    @if ($konten)
      {{ $konten->judul }}
    @else
      Konten Tidak Ditemukan
    @endif
  </h2>

  {{-- Isi konten dari database --}}
  <div class="prose prose-lg mx-auto text-white" data-aos="fade-up">
    @if ($konten)
      {!! nl2br($konten->isi) !!}
    @endif
  </div>
</section>
<footer class="text-center py-4 bg-purple-800">
    <p>&copy; 2025 FKOMINFO Universitas Garut. All rights reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({ duration: 1200, once: true });
</script>
</body>
</html>

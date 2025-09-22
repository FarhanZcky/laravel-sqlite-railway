<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Alumni - Tracer Study FKOMINFO</title>
  @vite('resources/css/app.css') 
  @vite('resources/js/app.js')
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

  <!-- AOS untuk animasi -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #ff03c0, #6a0dad);
      color: white;
      margin: 0;
      padding: 0;
    }

    /* Navbar */
    nav { background: rgba(255, 255, 255, 0.1); }
    nav .logo { font-size: 22px; font-weight: 700; letter-spacing: 2px; }
    nav ul { list-style: none; display: flex; gap: 25px; }
    nav ul li a { text-decoration: none; color: white; font-weight: 500; transition: 0.3s; }
    nav ul li a:hover { color: #ffd700; }

    /* Hero */
    .hero {
      min-height: 60vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 80px 20px;
    }
    .hero h1 { font-size: 42px; margin-bottom: 15px; font-weight: 700; }
    .hero p { font-size: 18px; max-width: 700px; margin: auto; line-height: 1.6; }

    /* Card */
    .card {
      background: rgba(255,255,255,0.1);
      padding: 30px;
      border-radius: 15px;
      backdrop-filter: blur(6px);
      text-align: center;
      margin-bottom: 40px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }
    .card h3 { font-size: 24px; margin-bottom: 15px; }
    .card p { font-size: 16px; margin-bottom: 20px; }

    /* Tombol */
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

    <!-- Mobile Menu -->
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
    btn.addEventListener("click", () => {
      menu.classList.toggle("hidden");
    });
  </script>

  {{-- Hero --}}
  <section class="hero" data-aos="fade-up">
    <h1>Halo, Alumni!</h1>
    <p>Silakan isi kuisioner tracer study untuk membantu pengembangan FKOMINFO Universitas Garut.</p>
  </section>

  {{-- Konten Alumni --}}
  <div class="container mx-auto px-4">
    <div class="card" data-aos="fade-up">
      <h3>📝 Kuisioner Tracer Study</h3>
      <p>Klik tombol di bawah ini untuk mulai mengisi kuisioner tracer study.</p>
      <a href="{{ url('/kuisioner') }}" class="btn">Isi Kuisioner</a>
    </div>
  </div>

  <footer>
    <p>&copy; 2025 FKOMINFO Universitas Garut. All rights reserved.</p>
  </footer>

  <!-- AOS JS -->
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({ duration: 1200, once: true });
  </script>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Tracer Study FKOMINFO</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

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

        .flex-center { display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 20px; }
        .card { background: white; color: #4b0082; border-radius: 1rem; padding: 2rem; max-width: 400px; width: 100%; box-shadow: 0 4px 12px rgba(0,0,0,0.3); }
        .card h2 { text-align: center; font-weight: 700; margin-bottom: 1.5rem; color: #4b0082; }
        .input-field { width: 100%; padding: 0.75rem 1rem; border: 1px solid #ccc; border-radius: 0.5rem; margin-bottom: 1rem; }
        .input-field:focus { outline: none; border-color: #6a0dad; box-shadow: 0 0 0 2px rgba(106,13,173,0.2); }
        .btn { width: 100%; background: #6a0dad; color: white; padding: 0.75rem; border-radius: 0.5rem; font-weight: 600; transition: 0.3s; }
        .btn:hover { background: #4b0082; }
        .text-center { text-align: center; }
        .text-sm { font-size: 0.875rem; }
        .mt-4 { margin-top: 1rem; }
        .text-purple-700 { color: #6a0dad; }
        .hover-underline:hover { text-decoration: underline; }
        footer { text-align: center; padding: 20px; margin-top: 50px; font-size: 14px; color: white; }
        .error-message { color: red; font-size: 0.875rem; margin-bottom: 1rem; }
        .success-message { color: green; font-size: 0.875rem; margin-bottom: 1rem; }
    </style>
</head>
<body>

<nav class="bg-purple-700 text-white p-4">
  <div class="container mx-auto flex items-center justify-between">
    <div class="flex items-center space-x-2">
      <img src="{{ asset('img/FAKULTAS KOMUNIKASI DAN INFORMASI.png') }}" alt="Logo" class="h-10 w-10">
      <span class="font-bold text-lg">FAKULTAS KOMUNIKASI DAN INFORMASI</span>
    </div>
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
      <li><a href="{{ route('login.form') }}" class="text-white hover:text-gray-300">Login</a></li>
    </ul>
  </div>
</nav>

<div class="flex-center">
    <div class="card">
        <h2>Registrasi Akun</h2>

        @if($errors->any())
            <div class="error-message">
                {{ $errors->first() }}
            </div>
        @endif

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('register.alumni') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nama Lengkap" required class="input-field">
            <input type="email" name="email" placeholder="Email" required class="input-field">
            <input type="password" name="password" placeholder="Password" required class="input-field">
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required class="input-field">

            <button type="submit" class="btn">Daftar</button>
        </form>

        <p class="text-center text-sm mt-4">
            Sudah punya akun? 
            <a href="{{ route('login.form') }}" class="text-purple-700 hover-underline">Login di sini</a>
        </p>
    </div>
</div>

<footer>
    &copy; 2025 FKOMINFO Universitas Garut. All rights reserved.
</footer>

</body>
</html>

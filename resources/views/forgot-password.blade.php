<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Tracer Study FKOMINFO</title>
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

<div class="flex-center">
    <div class="card">
        <h2>Lupa Password</h2>
        <p class="text-center mb-4">Masukkan email Anda untuk menerima link reset password.</p>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="error-message">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Masukkan email anda" required class="input-field">
            <button type="submit" class="btn">Kirim Link Reset</button>
        </form>

        <p class="text-center text-sm mt-4">
            <a href="{{ route('login.form') }}" class="text-purple-700 hover-underline">Kembali ke Login</a>
        </p>
    </div>
</div>

<footer>
    &copy; 2025 FKOMINFO Universitas Garut. All rights reserved.
</footer>

</body>
</html>

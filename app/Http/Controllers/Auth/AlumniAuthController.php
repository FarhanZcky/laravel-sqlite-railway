<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // kalau alumni disimpan di tabel users
use Illuminate\Support\Facades\Hash;

class AlumniAuthController extends Controller
{
    // Tampilkan halaman form register
    public function showRegisterForm()
    {
        return view('register'); // ini file register.blade.php
    }

    // Simpan data alumni baru
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        // Buat user baru dengan role alumni
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'alumni', // pastikan ada kolom "role" di tabel users
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }
}

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KuisionerController;
use App\Http\Controllers\AdminExportController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AlumniController;

// Halaman statis/dinamis
Route::get('/', function () {
    return view('welcome');
});

// Halaman dinamis dari database
Route::get('/{halaman}', [HalamanController::class, 'tampilkanHalaman'])
    ->whereIn('halaman', ['ilkom', 'visi-misi', 'ti', 'rpl', 'rsk', 'sejarah', 'alumni'])
    ->name('halaman');

// KUISIONER
Route::get('/kuisioner', [KuisionerController::class, 'index'])->name('kuisioner');
Route::post('/kuisioner/submit', [KuisionerController::class, 'submit'])->name('kuisioner.submit');

// ADMIN GROUP
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/statistik', [KuisionerController::class, 'statistik'])->name('statistik');
    Route::get('/export', [AdminExportController::class, 'export'])->name('export');
    Route::get('/editkonten/{halaman}', [AdminController::class, 'editKonten'])->name('editkonten');
    Route::put('/update-konten/{halaman}', [AdminController::class, 'updateKonten'])->name('update.konten');
});

// REGISTER
Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register.alumni');

// LOGIN & LOGOUT
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// FORGOT PASSWORD
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');

// RESET PASSWORD
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// DASHBOARD ALUMNI
Route::get('/alumni', [AlumniController::class, 'index'])->name('alumni.dashboard');

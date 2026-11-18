<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Route bawaan Breeze (login, register, logout)
require __DIR__.'/auth.php';

// Dashboard umum (semua role yang login bisa akses)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// ROUTE ADMIN
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', fn () => 'Halaman Admin — Manajemen Pengguna');
});

// ROUTE DOSEN
Route::middleware(['auth', 'role:dosen'])->group(function () {
    Route::get('/dosen', fn () => 'Dashboard Dosen');
});
    
// ROUTE MAHASISWA
Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/mahasiswa', fn () => 'Dashboard Mahasiswa');
});

// ROUTE ADMIN & DOSEN (Kelola Materi & Nilai)
Route::middleware(['auth', 'role:admin,dosen'])->group(function () {
    Route::get('/kelola-materi', fn () => 'Kelola Materi');
    Route::get('/kelola-nilai', fn () => 'Kelola Nilai');
});

// Rute untuk halaman Profile (bawaan Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
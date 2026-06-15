<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\KontakController;

// Halaman Publik
Route::get('/', function () { return view('home'); });
Route::get('/profil', function () { return view('profil'); });
Route::get('/keanggotaan', function () { return view('keanggotaan'); });
Route::get('/produk', function () { return view('produk'); });
Route::get('/kontak', function () { return view('kontak'); });

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman Anggota
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard-anggota', [AnggotaController::class, 'dashboard']);
    Route::get('/ajukan-pinjaman', [AnggotaController::class, 'formPinjaman']);
    Route::post('/ajukan-pinjaman', [AnggotaController::class, 'ajukanPinjaman']);
    Route::get('/anggota/ganti-password', [AnggotaController::class, 'gantiPasswordForm']);
    Route::post('/anggota/ganti-password', [AnggotaController::class, 'gantiPassword']);
    Route::get('/petugas/daftar-pesan', [PetugasController::class, 'daftarPesan']);
    Route::get('/petugas/pesan/{id}', [PetugasController::class, 'bacaPesan']);
    Route::post('/petugas/pesan/{id}/dibalas', [PetugasController::class, 'tandaiDibalas']);
});

// Halaman Petugas
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard-petugas', [PetugasController::class, 'dashboard']);
    Route::get('/pengajuan/{id}', [PetugasController::class, 'detailPengajuan']);
    Route::post('/pengajuan/{id}/proses', [PetugasController::class, 'prosesPengajuan']);
    Route::get('/petugas/kelola-akun', [PetugasController::class, 'kelolaAkun']);
    Route::post('/petugas/buat-akun', [PetugasController::class, 'buatAkunPetugas']);
    Route::post('/petugas/akun/{id}/reset-password', [PetugasController::class, 'resetPasswordPetugas']);
    Route::get('/petugas/ganti-password', [PetugasController::class, 'gantiPasswordForm']);
    Route::post('/petugas/ganti-password', [PetugasController::class, 'gantiPassword']);
    Route::get('/petugas/kelola-anggota', [PetugasController::class, 'kelolaAnggota']);
    Route::post('/petugas/anggota/{id}/nonaktifkan', [PetugasController::class, 'nonaktifkanAnggota']);
    Route::post('/petugas/anggota/{id}/aktifkan', [PetugasController::class, 'aktifkanAnggota']);
    Route::post('/petugas/buat-akun-anggota', [PetugasController::class, 'buatAkunAnggota']);
    Route::post('/petugas/anggota/{id}/reset-password', [PetugasController::class, 'resetPasswordAnggota']);
});

Route::post('/kontak/kirim', [KontakController::class, 'kirimPesan']);
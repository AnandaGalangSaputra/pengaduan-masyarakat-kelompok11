<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PengaduanMasukController;

/*
|--------------------------------------------------------------------------
| Web Routes (Simple Version)
|--------------------------------------------------------------------------
*/

// ========== AUTH (GUEST) ==========
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// ========== LOGOUT ==========
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ========== SETELAH LOGIN ==========
Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    // Pengaduan
    Route::get('/pengaduanmasuk', [PengaduanMasukController::class, 'index'])->name('pengaduan_masuk.index');
    Route::get('/pengaduan/{id}/cetak', [PengaduanMasukController::class, 'cetak'])->name('pengaduan.cetak');
    Route::get('/pengaduan/{id}', [PengaduanMasukController::class, 'show'])->name('pengaduan.show');
    Route::delete('/pengaduan/bulk-delete', [PengaduanMasukController::class, 'bulkDelete'])->name('pengaduan.bulkDelete');
    Route::get('/pengaduan/{id}/tindak', [PengaduanMasukController::class, 'tindak'])->name('pengaduan.tindak');
    Route::post('/pengaduan/{id}/tindak', [PengaduanMasukController::class, 'prosesTindak'])->name('pengaduan.prosesTindak');
    Route::get('/riwayat-pengaduan', [PengaduanMasukController::class, 'riwayatPengaduan'])->name('pengaduan.riwayatpengaduan');
    Route::get('/analisis-aduan/cetak', [PengaduanMasukController::class, 'cetakAnalisis'])->name('analisis.cetak');

    // Master Data
    Route::resource('kategori', KategoriController::class);
    Route::resource('users', UserController::class);
    Route::post('users/bulk-delete', [UserController::class, 'bulkDelete'])->name('users.bulkDelete');
});

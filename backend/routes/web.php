<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaduanMasukController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Route Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Semua route berikut hanya bisa diakses setelah login
Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/pengaduanmasuk', [PengaduanMasukController::class, 'index'])->name('pengaduan_masuk.index');
    Route::get('/pengaduan/{id}/cetak', [PengaduanMasukController::class, 'cetak'])->name('pengaduan.cetak');
    Route::get('/pengaduan/{id}', [PengaduanMasukController::class, 'show'])->name('pengaduan.show');
    Route::delete('/pengaduan/bulk-delete', [PengaduanMasukController::class, 'bulkDelete'])->name('pengaduan.bulkDelete');
    Route::get('/pengaduan/{id}/tindak', [PengaduanMasukController::class, 'tindak'])->name('pengaduan.tindak');
    Route::post('/pengaduan/{id}/tindak', [PengaduanMasukController::class, 'prosesTindak'])->name('pengaduan.prosesTindak');
    Route::get('/riwayat-pengaduan', [PengaduanMasukController::class, 'riwayatPengaduan'])->name('pengaduan.riwayatpengaduan');
    Route::get('/analisis-aduan/cetak', [PengaduanMasukController::class, 'cetakAnalisis'])->name('analisis.cetak');
    Route::resource('kategori', \App\Http\Controllers\KategoriController::class);
    Route::resource('users', UserController::class);
    Route::post('users/bulk-delete', [UserController::class, 'bulkDelete'])->name('users.bulkDelete');
});



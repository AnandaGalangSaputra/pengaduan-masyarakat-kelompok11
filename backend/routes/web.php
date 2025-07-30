<?php

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/pengaduanmasuk', [PengaduanMasukController::class, 'index'])->name('pengaduan_masuk.index');
Route::get('/pengaduan/{id}/cetak', [PengaduanMasukController::class, 'cetak'])->name('pengaduan.cetak');
Route::get('/pengaduan/{id}', [PengaduanMasukController::class, 'show'])->name('pengaduan.show');
Route::delete('/pengaduan/bulk-delete', [PengaduanMasukController::class, 'bulkDelete'])->name('pengaduan.bulkDelete');

Route::get('/pengaduan/{id}/tindak', [PengaduanMasukController::class, 'tindak'])->name('pengaduan.tindak');
Route::post('/pengaduan/{id}/tindak', [PengaduanMasukController::class, 'prosesTindak'])->name('pengaduan.prosesTindak');

Route::get('/riwayat-pengaduan', [PengaduanMasukController::class, 'riwayatPengaduan'])->name('pengaduan.riwayatpengaduan');

// Dashboard

Route::get('/analisis-aduan/cetak', [PengaduanMasukController::class, 'cetakAnalisis'])
     ->name('analisis.cetak');

// Kategori Pengaduan
Route::resource('kategori', \App\Http\Controllers\KategoriController::class);


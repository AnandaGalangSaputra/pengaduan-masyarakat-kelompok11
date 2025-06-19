<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaduanController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/pengaduan', [PengaduanController::class, 'store']);
Route::post('/x', [PengaduanController::class, 'tampil']); 

Route::get('/pengaduan', [PengaduanController::class, 'tampil']);
Route::get('/lacak', [PengaduanController::class, 'lacak']);


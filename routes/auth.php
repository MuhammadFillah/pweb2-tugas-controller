<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::prefix('auth')->group(function () {
    Route::get('/masuk/{id}', [AuthController::class, 'masuk']);
    Route::get('/cek/{id}', [AuthController::class, 'cekSesi']);
    Route::get('/cek-akses/{id}', [AuthController::class, 'cekAkses']);
    Route::get('/profil/{id}', [AuthController::class, 'ambilProfil']);
    Route::get('/keluar/{id}', [AuthController::class, 'keluar']);
});
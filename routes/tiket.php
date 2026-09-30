<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiketController;

Route::prefix('tiket')->group(function () {
    Route::get('/daftar', [TiketController::class, 'ambilSemuaTiket']);
    Route::get('/detail/{id}', [TiketController::class, 'ambilDetailTiket']);
    Route::get('/cek-stok/{id}/{jumlah}', [TiketController::class, 'cekStokTiket']);
    Route::get('/hitung/{id}/{jumlah}', [TiketController::class, 'hitungTotalHarga']);
    Route::get('/kurangi-stok/{id}/{jumlah}', [TiketController::class, 'kurangiStokTiket']);
});
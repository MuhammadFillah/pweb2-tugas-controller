<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembayaranController;

Route::prefix('pembayaran')->group(function () {
    Route::get('/buat-tagihan/{idPengguna}/{idTiket}/{jumlah}', [PembayaranController::class, 'buatTagihan']);
    Route::get('/proses', [PembayaranController::class, 'prosesBayar']);
    Route::get('/catat/{idTagihan}/{total}', [PembayaranController::class, 'catatTransaksi']);
    Route::get('/konfirmasi/{idPengguna}/{idTiket}/{jumlah}/{idTagihan}', [PembayaranController::class, 'kirimKonfirmasi']);
    Route::get('/riwayat/{idTagihan}', [PembayaranController::class, 'ambilRiwayatTransaksi']);
});
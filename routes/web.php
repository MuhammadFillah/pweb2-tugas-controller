<?php
use App\Http\Controllers\ListMahasiswaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KalkulatorController;

Route::get('/datadiri', [ProfilController::class, 'index']);

// opsi 1
Route::get('/listMahasiswa', function() {
    return view('list-mahasiswa');
});

Route::prefix('v1')->group(function() {
    Route::get('/ListMahasiswa', [ListMahasiswaController::class, 'Mahasiswa']);
    Route::get('/ListMahasiswa/{nama}', [ListMahasiswaController::class, 'NamaMahasiswa']);

    Route::get('/Kalkulator', [KalkulatorController::class, 'kalkulator']);
    Route::get('/Kalkulator/{angka1}/{angka2}', [KalkulatorController::class, 'kalkulator']);
    Route::get('/Kalkulator/{angka1}/{angka2}', [KalkulatorController::class, 'kalkulator']);
});

// File Router Tugas
require __DIR__.'/tiket.php';
require __DIR__.'/auth.php';
require __DIR__.'/pembayaran.php';
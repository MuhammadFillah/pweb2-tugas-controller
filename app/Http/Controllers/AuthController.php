<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public static $sesiPengguna = [
        1 => ['id' => 1, 'nama' => 'Budi', 'sudah_login' => false]
    ];

    // Fungsi 1: Masuk Akun
    public function masuk($id)
    {
        if (isset(self::$sesiPengguna[$id])) {
            self::$sesiPengguna[$id]['sudah_login'] = true;
            return "Status: Sukses | Pesan: Pengguna ID {$id} berhasil masuk.";
        }
        return "Status: Gagal | Pesan: Pengguna tidak ditemukan.";
    }

    // Fungsi 2: Cek Sesi Login
    public function cekSesi($id)
    {
        $status = (self::$sesiPengguna[$id]['sudah_login'] ?? false) ? 'Sudah Login' : 'Belum Login';
        return "ID Pengguna: {$id} | Status Login: {$status}";
    }

    // Fungsi 3: Validasi Hak Akses
    public function cekAkses($id)
    {
        if (self::$sesiPengguna[$id]['sudah_login'] ?? false) {
            return "Status: Diizinkan | Pesan: Akses diberikan untuk ID {$id}.";
        }
        return "Status: Ditolak | Pesan: Silakan masuk terlebih dahulu.";
    }

    // Fungsi 4: Tampilkan Profil Pengguna
    public function ambilProfil($id)
    {
        if (isset(self::$sesiPengguna[$id])) {
            $user = self::$sesiPengguna[$id];
            $status = $user['sudah_login'] ? 'Aktif' : 'Tidak Aktif';
            return "Profil Pengguna -> ID: {$user['id']} | Nama: {$user['nama']} | Status Sesi: {$status}";
        }
        return "Profil tidak ditemukan.";
    }

    // Fungsi 5: Keluar Akun
    public function keluar($id)
    {
        if (isset(self::$sesiPengguna[$id])) {
            self::$sesiPengguna[$id]['sudah_login'] = false;
            return "Status: Sukses | Pesan: Pengguna ID {$id} berhasil keluar.";
        }
        return "Status: Gagal | Pesan: Gagal keluar akun.";
    }
}
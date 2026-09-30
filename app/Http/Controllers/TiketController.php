<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TiketController extends Controller
{
    // VARIABEL 2: Data Katalog Tiket
    public static $daftarTiket = [
        101 => ['id' => 101, 'nama' => 'Tiket Bioskop Delta', 'harga' => 50000, 'stok' => 10]
    ];

    // Fungsi 6: Tampilkan Semua Tiket
    public function ambilSemuaTiket()
    {
        return response()->json(['daftar_tiket' => self::$daftarTiket]);
    }

    // Fungsi 7: Tampilkan Detail Tiket
    public function ambilDetailTiket($id)
    {
        $tiket = self::$daftarTiket[$id] ?? null;
        return response()->json(['detail' => $tiket]);
    }

    // Fungsi 8: Cek Ketersediaan Stok
    public function cekStokTiket($id, $jumlah)
    {
        $tersedia = isset(self::$daftarTiket[$id]) && self::$daftarTiket[$id]['stok'] >= $jumlah;
        return response()->json(['id_tiket' => $id, 'tersedia' => $tersedia]);
    }

    // Fungsi 9: Hitung Total Harga Tiket
    public function hitungTotalHarga($id, $jumlah)
    {
        $harga = self::$daftarTiket[$id]['harga'] ?? 0;
        return response()->json(['total_harga' => $harga * $jumlah]);
    }

    // Fungsi 10: Kurangi Stok Tiket
    public function kurangiStokTiket($id, $jumlah)
    {
        if (isset(self::$daftarTiket[$id]) && self::$daftarTiket[$id]['stok'] >= $jumlah) {
            self::$daftarTiket[$id]['stok'] -= $jumlah;
            return response()->json(['status' => 'sukses', 'sisa_stok' => self::$daftarTiket[$id]['stok']]);
        }
        return response()->json(['status' => 'gagal', 'pesan' => "Stok tiket tidak mencukupi."], 400);
    }
}
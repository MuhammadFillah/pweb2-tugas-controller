<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    // VARIABEL 3: Data Riwayat Transaksi
    public static $riwayatTransaksi = [];

    // Fungsi 11: Buat Tagihan Pembayaran
    public function buatTagihan($idPengguna, $idTiket, $jumlah)
    {
        $kontrolerAuth = new AuthController();
        $kontrolerTiket = new TiketController();

        // Integrasi cek sesi login
        $cekAuth = json_decode($kontrolerAuth->cekSesi($idPengguna)->getContent(), true);
        if (!$cekAuth['sudah_login']) {
            return response()->json(['status' => 'gagal', 'alasan' => 'Pengguna Belum Login'], 401);
        }

        // Integrasi cek stok tiket
        $cekStok = json_decode($kontrolerTiket->cekStokTiket($idTiket, $jumlah)->getContent(), true);
        if (!$cekStok['tersedia']) {
            return response()->json(['status' => 'gagal', 'alasan' => 'Stok Tiket Tidak Cukup'], 400);
        }

        // Hitung total bayar
        $dataTotal = json_decode($kontrolerTiket->hitungTotalHarga($idTiket, $jumlah)->getContent(), true);

        return response()->json([
            'id_tagihan' => 'TAGIHAN-' . rand(1000, 9999),
            'id_pengguna' => $idPengguna,
            'id_tiket' => $idTiket,
            'jumlah' => $jumlah,
            'total_bayar' => $dataTotal['total_harga'],
            'status' => 'MENUNGGU'
        ]);
    }

    // Fungsi 12: Proses Pembayaran
    public function prosesBayar(Request $permintaan)
    {
        $idTagihan = $permintaan->input('id_tagihan', 'TAGIHAN-' . rand(1000, 9999));
        return response()->json(['id_tagihan' => $idTagihan, 'status' => 'LUNAS']);
    }

    // Fungsi 13: Catat Transaksi Ke Memory
    public function catatTransaksi($idTagihan, $total)
    {
        self::$riwayatTransaksi[$idTagihan] = [
            'total' => $total,
            'status' => 'BERHASIL',
            'waktu' => date('Y-m-d H:i:s')
        ];
        return response()->json(['status' => 'dicatat', 'id_tagihan' => $idTagihan]);
    }

    // Fungsi 14: Kirim Konfirmasi & Potong Stok
    public function kirimKonfirmasi($idPengguna, $idTiket, $jumlah, $idTagihan)
    {
        $kontrolerTiket = new TiketController();
        $kontrolerTiket->kurangiStokTiket($idTiket, $jumlah);

        return response()->json([
            'pesan' => "Pembayaran berhasil! Tiket untuk Pengguna {$idPengguna} telah diterbitkan.",
            'id_tagihan' => $idTagihan
        ]);
    }

    // Fungsi 15: Tampilkan Riwayat Transaksi
    public function ambilRiwayatTransaksi($idTagihan)
    {
        $data = self::$riwayatTransaksi[$idTagihan] ?? null;
        return response()->json(['riwayat' => $data]);
    }
}
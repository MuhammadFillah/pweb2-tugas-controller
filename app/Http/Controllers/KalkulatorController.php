<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KalkulatorController extends Controller
{
    public function kalkulator($angka1, $angka2)
    {
        $hasil = $angka1 + $angka2;
        return $this->hasil($angka1, $angka2);
    }

    public function tambah($angka1, $angka2)
    {
        $hasil = $angka1 + $angka2;
        return $hasil;
    }

    public function kurang($angka1, $angka2)
    {
        $hasil = $angka1 - $angka2;
        return $hasil;
    }
    
    public function hasil($angka1, $angka2)
    {
        $variable1 = $this ->tambah($angka1, $angka2);
        $variaible2 = $this ->kurang($angka1, $angka2);
        return view('kalkulator', compact('angka1', 'angka2', 'variable1', 'variaible2'));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListMahasiswaController extends Controller
{
    //
public function ListMahasiswaFromController(){
    return view('mahasiswa',);
    }

public function NamaMahasiswa($nama)
    {
        return view('NamaMahasiswa', compact('nama'));
    }
}

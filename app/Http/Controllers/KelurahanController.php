<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;

class KelurahanController extends Controller
{
    public function index() 
    {
        return view('layouts.app');
    }

    // public function penduduk() 
    // {
    //     $nik = "635416531465315";
    //     $nama = "Hehehehe";
    //     $jk = "Laki-Laki";
    //     $alamat = "Jalan abc de";

    //     return view('penduduk', compact('nik', 'nama', 'jk', 'alamat'));
    // }

    public function penduduk() {
        // Mengambil seluruh data dari database melalui Model 
        $warga = Penduduk::all(); 
        return view('penduduk', compact('warga'));
    }

}

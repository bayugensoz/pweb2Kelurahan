<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Surat;

class KelurahanController extends Controller
{
    public function index() 
    {
        return view('layouts.app');
    }

    public function penduduk() 
    {
        $nik = "635416531465315";
        $nama = "Hehehehe";
        $jk = "Laki-Laki";
        $alamat = "Jalan abc de";

        return view('penduduk', compact('nik', 'nama', 'jk', 'alamat'));
    }

    public function daftarPenduduk() {
        // Mengambil seluruh data dari database melalui Model 
        $warga = Penduduk::all(); 
        return view('penduduk', compact('warga'));
    }

    public function daftarSurat() {
        $semuaSurat = Surat::with('penduduk')->get();
        return view('surat_index', compact('semuaSurat'));
    }

}

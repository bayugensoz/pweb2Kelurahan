<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    public function index() 
    {
        return view('layouts.app');
    }

    public function penduduk() 
    {
        $id = "ini body 1";
        $id2 = "ini body 2";
        $id3 = "ini body 3";

        return view('penduduk', compact('id', 'id2', 'id3'));
    }
}

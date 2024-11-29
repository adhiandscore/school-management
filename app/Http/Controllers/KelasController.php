<?php

namespace App\Http\Controllers;

use App\Models\Kelas;

class KelasController extends Controller
{

    public function showSiswas(Kelas $kelas) {
        $siswas = $kelas->siswas;
        return view('kelas.index', compact('siswas', 'kelas'));
    }

    public function showGurus(Kelas $kelas) {
        $gurus = $kelas->gurus;
        return view('kelas.gurus', compact('gurus', 'kelas'));
    }
    
}

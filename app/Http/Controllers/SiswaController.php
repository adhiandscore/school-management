<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        // Ambil data siswa dari database (contoh sederhana)
        $siswa = \App\Models\Siswa::all();

        // Kirim data ke view
        return view('siswa.index', compact('siswa'));
    }
    
    public function create() {
        $kelas = Kelas::all();
        return view('siswa.create', compact('kelas'));
    }
    
    public function store(Request $request) {
        Siswa::create($request->all());
        return redirect()->route('siswa.index');
    }
    
    public function edit(Siswa $siswa) {
        $kelas = Kelas::all();
        return view('siswa.edit', compact('siswa', 'kelas'));
    }
    
    public function update(Request $request, Siswa $siswa) {
        $siswa->update($request->all());
        return redirect()->route('siswa.index');
    }
    
    public function destroy(Siswa $siswa) {
        $siswa->delete();
        return redirect()->route('siswa.index');
    }
    
}

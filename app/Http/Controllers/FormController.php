<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Guru;

class FormController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('form.index', compact('kelas'));
    }

    public function storeSiswa(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|integer',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        Siswa::create([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'kelas_id' => $request->kelas_id,
        ]);

        return back()->with('success', 'Siswa berhasil ditambahkan!');
    }

    public function storeKelas(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
        ]);

        return back()->with('success', 'Kelas berhasil ditambahkan!');
    }

    public function storeGuru(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Guru::create([
            'nama' => $request->nama,
        ]);

        return back()->with('success', 'Guru berhasil ditambahkan!');
    }
}

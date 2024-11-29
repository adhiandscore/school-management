<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('kelas')->get(); // Mengambil data siswa beserta relasi kelas
        // dd($siswa); // Debug data siswa
        return view('dashboard.index', compact('siswa'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        Siswa::create($request->all());
        return redirect()->route('siswa.index');
    }

    public function edit(Kelas $kelas)
    {
        // dd($id);
        $kelas = Siswa::findOrFail($kelas); // Pastikan ID valid
        return view('siswa.edit');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:10',
            'alamat' => 'nullable|string',
        ]);

        // Cari data siswa
        $siswa = Siswa::findOrFail($id);

        // Update data siswa
        $siswa->nama = $request->input('nama');
        $siswa->nis = $request->input('nis');
        $siswa->kelas = $request->input('kelas');
        $siswa->save();
        
        // Redirect dengan pesan sukses
    return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index');
    }

}

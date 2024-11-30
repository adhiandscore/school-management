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
        return view('siswa.index', compact('siswa'));
    }


    public function create()
    {
        $kelas = Kelas::all(); // Ambil semua data kelas
        return view('siswa.create', compact('kelas'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|max:50|unique:siswas,nis',
            'kelas_id' => 'nullable|exists:kelas,id',
        ]);

        Siswa::create($request->all()); // Simpan data siswa
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan!');
    }


    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id); // Ambil data siswa atau tampilkan 404
        $kelas = Kelas::all(); // Ambil semua data kelas
        return view('siswa.edit', compact('siswa', 'kelas'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => "required|string|max:50|unique:siswas,nis,$id", // Pastikan unik kecuali untuk ID saat ini
            'kelas_id' => 'nullable|exists:kelas,id',
        ]);

        $siswa = Siswa::findOrFail($id); // Ambil data siswa
        $siswa->update($request->all()); // Update data siswa

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id); // Pastikan ID siswa valid
        $siswa->delete(); // Hapus siswa
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus!');
    }

}

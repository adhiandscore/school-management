<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{

    public function index()
    {
        $kelas = Kelas::all(); // Ambil semua data kelas
        dd($kelas); // Tampilkan data untuk debugging
        return view('kelas.index', compact('kelas')); // Kirim ke view
    }

    // Tampilkan form untuk tambah data kelas
    public function create()
    {
        return view('kelas.create');
    }

    // Simpan data kelas baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'guru_id' => 'required|exists:gurus,id', // Validasi jika menggunakan relasi dengan tabel guru
        ]);

        Kelas::create($request->all()); // Simpan data ke database

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan!');
    }

    // Tampilkan detail data kelas berdasarkan ID
    public function show($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('kelas.show', compact('kelas'));
    }

    // Tampilkan form untuk edit data kelas
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('kelas.edit', compact('kelas'));
    }

    // Update data kelas berdasarkan ID
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->all()); // Update data di database

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil diperbarui!');
    }

    // Hapus data kelas berdasarkan ID
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete(); // Hapus data dari database

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus!');
    }
}

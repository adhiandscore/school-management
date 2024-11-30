<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{

    public function index()
{
    $kelas = Kelas::all(); 
    return view('kelas.index', compact('kelas'));
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
            'nama_kelas' => 'required|string|max:255', // Konsistensi nama_kelas
            'guru_id' => 'nullable|exists:gurus,id', // Guru tidak wajib jika memang opsional
        ]);

        Kelas::create($request->only(['nama_kelas', 'guru_id'])); // Hanya ambil field yang valid
        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan!');
    }

    // Tampilkan detail data kelas berdasarkan ID
    public function show($id)
    {
        $kelas = Kelas::find($id);

        if (!$kelas) {
            return redirect()->route('kelas.index')->with('error', 'Kelas tidak ditemukan!');
        }

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

        // Contoh validasi tambahan sebelum menghapus
        if ($kelas->siswas()->exists()) {
            return redirect()->route('kelas.index')->with('error', 'Kelas ini memiliki siswa yang terkait, tidak dapat dihapus!');
        }

        $kelas->delete();
        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus!');
    }
}

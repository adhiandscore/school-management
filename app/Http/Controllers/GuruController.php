<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class GuruController extends Controller
{
    // Tampilkan daftar guru
    public function index()
    {
        // Mengambil semua data guru
        $gurus = Guru::with('kelases')->get(); // Tambahkan eager loading untuk relasi 'kelases'
        return view('guru.index', compact('gurus'));
    }

    public function edit(Guru $guru)
    {
        $guru->load('kelases');
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        // Update data guru
        $guru->update($request->only('nama')); // Hanya update field yang diizinkan
        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui!');
    }

    public function destroy(Guru $guru)
    {
        // Pastikan semua relasi dihapus jika dibutuhkan
        $guru->kelases()->detach(); // Hapus relasi dengan kelas sebelum menghapus guru
        $guru->delete();
        return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus!');
    }

}

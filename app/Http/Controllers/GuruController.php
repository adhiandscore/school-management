<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class GuruController extends Controller
{
    // Tampilkan daftar guru
    public function index()
    {
        $gurus = Guru::all();

        if ($gurus->isEmpty()) {
            return redirect()->route('guru.guruEmptyHandler');
        }

        return view('guru.index', compact('gurus'));
    }

    public function edit(Guru $guru)
    {
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'mata_pelajaran' => 'required|string|max:255',
        ]);

        $guru->update($request->all());
        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui!');
    }

    public function destroy(Guru $guru)
    {
        $guru->delete();
        return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus!');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $data = Kelas::with(['siswas', 'gurus'])->get();

            if ($data->isEmpty()) {
                return view('dashboard.index', ['data' => [], 'message' => 'Tidak ada data kelas yang tersedia.']);
            }

            return view('dashboard.index', compact('data'));
        } catch (\Exception $e) {
            return redirect()->route('home')->withErrors('Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}

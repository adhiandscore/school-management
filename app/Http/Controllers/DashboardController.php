<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data kelas beserta siswa dan guru yang terkait
        $data = Kelas::with(['siswas', 'gurus'])->get();

        // Kirimkan data ke view 'dashboard.index'
        return view('dashboard.index', compact('data'));
    }
}

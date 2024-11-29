<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\FormController;
require __DIR__ . '/auth.php';

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');

Route::get('/kelas', [KelasController::class, 'showSiswas'])->name('kelas.index');

Route::resource('guru', GuruController::class);

Route::middleware(['auth'])->group(function () {

    Route::view('/admin', 'AdminDashboard')
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

    Route::view('profile', 'profile')
        ->middleware(['auth'])
        ->name('profile');

    Route::get('/kelas/{kelas}/siswas', [KelasController::class, 'showSiswas']);

    Route::get('/kelas/gurus', [KelasController::class, 'showGurus']);
    Route::get('/form', [FormController::class, 'index'])->name('form.index');
    Route::post('/form/siswa', [FormController::class, 'storeSiswa'])->name('form.siswa.store');
    Route::post('/form/kelas', [FormController::class, 'storeKelas'])->name('form.kelas.store');
    Route::post('/form/guru', [FormController::class, 'storeGuru'])->name('form.guru.store');

});


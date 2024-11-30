<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\FormController;
require __DIR__ . '/auth.php';


Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/siswa', SiswaController::class);
    Route::resource('/guru', GuruController::class);
    Route::resource('/kelas', GuruController::class);

    Route::prefix('kelas')->name('kelas.')->group(function () {
        Route::get('/', [KelasController::class, 'index'])->name('index');
        Route::get('/create', [KelasController::class, 'create'])->name('create');
        Route::post('/', [KelasController::class, 'store'])->name('store');
        Route::get('/{id}', [KelasController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [KelasController::class, 'edit'])->name('edit');
        Route::put('/{id}', [KelasController::class, 'update'])->name('update');
        Route::delete('/{id}', [KelasController::class, 'destroy'])->name('destroy');
    });

    Route::get('/admin', function () {
        return redirect()->route('dashboard'); // Redirect to named route
    })->middleware(['auth', 'verified']);

    Route::view('profile', 'profile')
        ->middleware(['auth'])
        ->name('profile');

    Route::get('/form', [FormController::class, 'index'])->name('form.index');
    Route::post('/form/siswa', [FormController::class, 'storeSiswa'])->name('form.siswa.store');
    Route::post('/form/kelas', [FormController::class, 'storeKelas'])->name('form.kelas.store');
    Route::post('/form/guru', [FormController::class, 'storeGuru'])->name('form.guru.store');


});


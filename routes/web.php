<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CetakRaporController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
    
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('siswas', SiswaController::class);
    Route::resource('nilais', NilaiController::class);

    Route::get('/cetak-rapor', [CetakRaporController::class, 'index'])->name('cetak.index');
    Route::post('/cetak-rapor', [CetakRaporController::class, 'cetak'])->name('cetak.rapor');
    Route::post('cetak-rapor/show', [CetakRaporController::class, 'showNilai'])->name('cetak.showNilai');
    Route::post('/export-excel', [CetakRaporController::class, 'exportExcel'])->name('export.excel');
});

require __DIR__.'/auth.php';

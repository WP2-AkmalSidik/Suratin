<?php

use App\Http\Controllers\Surat\SuratController;
use App\Http\Controllers\Surat\SuratKeluarController;
use App\Http\Controllers\Surat\SuratMasukController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SuratController::class, 'index'])->name('dashboard');
//Surat Masuk
Route::get('/surat-masuk', [SuratMasukController::class, 'index'])->name('surat-masuk.index');
Route::get('/surat-masuk/{id}', [SuratMasukController::class, 'show'])->name('surat-masuk.show');
Route::get('/surat-masuk/{id}', [SuratMasukController::class, 'show'])->name('surat-masuk.show');
Route::post('/surat-masuk', [SuratMasukController::class, 'store'])->name('surat-masuk.store');
Route::delete('/surat-masuk/{id}', [SuratMasukController::class, 'destroy'])->name('surat-masuk.destroy');
//Surat Keluar
Route::get('/surat-keluar', [SuratKeluarController::class, 'index'])->name('surat-keluar.index');
Route::post('/surat-keluar', [SuratKeluarController::class, 'store'])->name('surat-keluar.store');
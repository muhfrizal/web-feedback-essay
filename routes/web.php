<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SummaryController;

// Route::get('/logout', [UjianController::class, 'selesai'])->name('logout');
// Route::get('/ujian/{nomor}', [UjianController::class, 'soal'])->name('soal');
// Route::post('/ujian/{nomor}', [UjianController::class, 'simpan']);
// Route::get('/selesai', [UjianController::class, 'selesai'])->name('selesai');

Route::get('/', [LoginController::class, 'formLogin'])->name('formlogin');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/ujian/{nomor}', [UjianController::class, 'soal'])->name('soal');
    Route::post('/ujian/{nomor}', [UjianController::class, 'simpan']);
    Route::get('/selesai', [UjianController::class, 'selesai'])->name('selesai');

    Route::get('/summary',[SummaryController::class,'index'])->name('summary.index');
});
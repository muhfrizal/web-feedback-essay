<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\SoalController;

Route::get('/', [LoginController::class, 'formLogin'])->name('formlogin');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/ujian/{nomor}', [UjianController::class, 'soal'])->name('soal');
    Route::post('/ujian/{nomor}', [UjianController::class, 'simpan']);
    Route::get('/selesai', [UjianController::class, 'selesai'])->name('selesai');
    Route::get('/sudahmengisi', [UjianController::class, 'sudahmengisi'])->name('sudahmengisi');

    Route::get('/summary',[SummaryController::class,'index'])->name('summary.index');

    Route::get('/soal/create', [SoalController::class, 'create'])->name('soalcreate');
    Route::post('/soal', [SoalController::class, 'store'])->name('soal.store');
});
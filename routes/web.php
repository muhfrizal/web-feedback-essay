<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\SoalController;

// Route::get('/', [LoginController::class, 'formLogin'])->name('formlogin');
// Route::post('/login', [LoginController::class, 'login'])->name('login');
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::fallback(function () {
//     return redirect()->route('formlogin');
// });

// Route::middleware('auth')->group(function () {
//     Route::get('/ujian/{nomor}', [UjianController::class, 'soal'])->name('soal');
//     Route::post('/ujian/{nomor}', [UjianController::class, 'simpan']);
//     Route::get('/selesai', [UjianController::class, 'selesai'])->name('selesai');
//     Route::get('/done', [UjianController::class, 'sudahmengisi'])->name('sudahmengisi');

//     Route::get('/summary', [SummaryController::class, 'index'])->name('summary.index');

//     Route::get('/soal/create', [SoalController::class, 'create'])->name('soalcreate');
//     Route::post('/soal', [SoalController::class, 'store'])->name('soal.store');
// });

/*
|--------------------------------------------------------------------------
| Root Redirect (Cek Login)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('soal', 1) // langsung ke ujian
        : redirect()->route('formlogin'); // ke login
});

/*
|--------------------------------------------------------------------------
| Guest Only (Belum Login)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'formLogin')->name('formlogin');
        Route::post('/login', 'login')->name('login');
    });
});

/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
*/
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Protected Routes (Harus Login)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    /*
    | Ujian
    */
    Route::prefix('ujian')->controller(UjianController::class)->group(function () {
        Route::get('/{nomor}', 'soal')->name('soal');
        Route::post('/{nomor}', 'simpan');
    });

    Route::get('/selesai', [UjianController::class, 'selesai'])->name('selesai');
    Route::get('/done', [UjianController::class, 'sudahmengisi'])->name('sudahmengisi');

    /*
    | Summary
    */
    Route::get('/summary', [SummaryController::class, 'index'])->name('summary.index');

    /*
    | Soal Management
    */
    Route::prefix('soal')->controller(SoalController::class)->group(function () {
        Route::get('/create', 'create')->name('soal.create');
        Route::post('/', 'store')->name('soal.store');
    });

});

/*
|--------------------------------------------------------------------------
| Fallback (Route Tidak Ditemukan)
|--------------------------------------------------------------------------
*/
Route::fallback(function () {
    return redirect()->route('formlogin');
});
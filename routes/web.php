<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\pesananController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

/* ============================
   DETAIL SESI (HALAMAN DETAIL)
============================ */
Route::get('/aktivitas/detail-akan-datang', [SesiController::class, 'detailAkanDatang'])
    ->name('sesi.detail.akan');

Route::get('/aktivitas/detail-berlangsung', [SesiController::class, 'detailBerlangsung'])
    ->name('sesi.detail.berlangsung');

Route::get('/aktivitas/detail-lampau', [SesiController::class, 'detailLampau'])
    ->name('sesi.detail.lampau');


/* ============================
   LIST AKTIVITAS (AKAN / BERLANGSUNG / LAMPAU)
============================ */

// Halaman Aktivitas → Akan Datang
Route::get('/aktivitas', [pesananController::class, 'akanDatang'])
    ->name('aktivitas');

// Halaman Aktivitas → Berlangsung
Route::get('/aktivitas-berlangsung', [pesananController::class, 'berlangsung'])
    ->name('aktivitas.berlangsung');

// Halaman Aktivitas → Lampau
Route::get('/aktivitas-lampau', [pesananController::class, 'lampau'])
    ->name('aktivitas.lampau');


/* ============================
   GABUNG SESI BERLANGSUNG
============================ */
Route::get('/berlangsung/gabung-sesi', [pesananController::class, 'gabungSesi'])
    ->name('sesi.berlangsung');

Route::get('/berlangsung/end-call', [pesananController::class, 'endCall'])
    ->name('sesi.selesai');


/* ============================
   PESANAN
============================ */
Route::get('/pesanan/detail-pesanan', [SesiController::class, 'lihatDetailPesanan'])
    ->name('pesanan.detail');

Route::get('/pesan-sesi', [SesiController::class, 'pesanSesi'])
    ->name('pesanan.pesan');

Route::get('/pesan-sesi/jadwal', [SesiController::class, 'pesanJamSesi'])
    ->name('pesanan.jam');

Route::get('/konfirmasi-pesanan', [pesananController::class, 'berhasilPesan'])
    ->name('pesanan.berhasil');

Route::get('/konfirmasi-trial', [pesananController::class, 'berhasilTrial'])
    ->name('trial.berhasil');


/* ============================
   CHAT
============================ */
Route::get('/chat', function () {
    return view('Chat');
})->name('chat');


/* ============================
   PROFILE
============================ */
Route::get('/profile', function () {
    return view('Profile');
})->name('profile');

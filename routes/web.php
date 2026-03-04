<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Alat_beratController;
use App\Http\Controllers\Halal_IndustriesController;
use App\Http\Controllers\Jadwal_alatController;
use App\Http\Controllers\Laporan_pekerjaanController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PropertiController;
use App\Http\Controllers\TransaksiController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('admin', AdminController::class);
Route::resource('alat_berat', Alat_beratController::class);
Route::resource('halal_industries', Halal_IndustriesController::class);
Route::resource('jadwal_alat', Jadwal_alatController::class);
Route::resource('laporan_pekerjaan', Laporan_pekerjaanController::class);
Route::resource('operator', OperatorController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('properti', PropertiController::class);
Route::resource('transaksi', TransaksiController::class);
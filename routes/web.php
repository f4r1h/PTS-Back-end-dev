<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Alat_beratController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PropertiController;
use App\Http\Controllers\Jadwal_alatController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\Laporan_pekerjaanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Halal_IndustriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = auth()->user();
    
    if ($user->role === 'admin') {
        $stats = [
            'total_alat' => \App\Models\Alat_berat::count(),
            'alat_tersedia' => \App\Models\Alat_berat::where('status_sewa', 'tersedia')->count(),
            'total_pelanggan' => \App\Models\Pelanggan::count(),
            'total_transaksi' => \App\Models\Transaksi::count(),
        ];
        $recent_transaksi = \App\Models\Transaksi::with('pelanggan')->orderBy('created_at', 'desc')->take(5)->get();
        return view('admin.dashboard', compact('stats', 'recent_transaksi'));
    } else {
        $availableProperties = \App\Models\Alat_berat::where('status_sewa', 'tersedia')->get();
        $pelanggan = \App\Models\Pelanggan::where('email', $user->email)->first();
        $myApplications = collect();
        if ($pelanggan) {
            // Using jadwal_alat instead of properti if it's alat_berat rental
            $myApplications = \App\Models\Transaksi::where('pelanggan_id', $pelanggan->id)->orderBy('created_at', 'desc')->get();
        }
        return view('user.dashboard', compact('availableProperties', 'myApplications'));
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
    // User Rental Application Route
    Route::post('/applications', [TransaksiController::class, 'store'])->name('applications.store');

    // User penyewaan pages
    Route::get('/penyewaan', [TransaksiController::class, 'userIndex'])->name('user.penyewaan');
    Route::get('/penyewaan/buat', [TransaksiController::class, 'userCreate'])->name('user.penyewaan.create');
    Route::post('/penyewaan/buat', [TransaksiController::class, 'userStore'])->name('user.penyewaan.store');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('properties', Alat_beratController::class);
    Route::resource('tenants', PelangganController::class);
   
    // Indonesian resource routes for 100% controller routing and redirection compatibility
    Route::resource('Alat_berat', Alat_beratController::class);
    Route::resource('Pelanggan', PelangganController::class);
    Route::resource('Properti', PropertiController::class);
    Route::resource('Transaksi', TransaksiController::class);
    Route::resource('Jadwal_alat', Jadwal_alatController::class);
    Route::resource('Operator', OperatorController::class);
    Route::resource('Laporan_pekerjaan', Laporan_pekerjaanController::class);
    Route::resource('Admin', AdminController::class);
    Route::resource('Halal_Industries', Halal_IndustriesController::class);
   
    // Admin Rental / Penyewaan Management Routes
    Route::get('/penyewaan', [TransaksiController::class, 'adminIndex'])->name('admin.penyewaan.index');
    Route::patch('/penyewaan/{id}/status', [TransaksiController::class, 'adminUpdateStatus'])->name('admin.penyewaan.status');
    Route::get('/penyewaan/{id}', [TransaksiController::class, 'adminShow'])->name('admin.penyewaan.show');

    // Legacy routes
    Route::get('/applications', [TransaksiController::class, 'adminIndex'])->name('admin.applications.index');
    Route::patch('/applications/{application}', [TransaksiController::class, 'adminUpdate'])->name('admin.applications.update');
});

require __DIR__.'/auth.php';
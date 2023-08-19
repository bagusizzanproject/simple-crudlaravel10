<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Route::get('/dashboard/home',[PegawaiController::class, 'jumlahPegawai'])->name('home');

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::get('/list-pegawai', [PegawaiController::class, 'index'])->middleware('auth')->name('pegawai.index');

Route::get('/pegawai/form', [PegawaiController::class, 'create'])->middleware('auth')->name('pegawai.create');

Route::post('/pegawai', [PegawaiController::class, 'store'])->middleware('auth')->name('pegawai.store');

Route::get('/pegawai/show/{id}', [PegawaiController::class, 'show'])->middleware('auth')->name('pegawai.show');

Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit'])->middleware('auth')->name('pegawai.edit');

Route::put('/pegawai/update/{id}', [PegawaiController::class, 'update'])->middleware('auth')->name('pegawai.update');

Route::delete('/pegawai/{id}', [PegawaiController::class, 'destroy'])->middleware('auth')->name('pegawai.destroy');

Route::delete('/pegawai/foto/{id}', [PegawaiController::class, 'deleteFoto'])->middleware('auth')->name('pegawai.deleteFoto');

Route::get('/pegawai', [PegawaiController::class,'cariData'])->middleware('auth')->name('pegawai.cari');



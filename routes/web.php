<?php

use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;

// Halaman Utama (Tabel)
Route::get('/absen', [AttendanceController::class, 'index']);

// Halaman Tambah Data
Route::get('/absen/tambah', [AttendanceController::class, 'create']);
Route::post('/absen/store', [AttendanceController::class, 'store']);

// Halaman Edit Data
Route::get('/absen/edit/{id}', [AttendanceController::class, 'edit']);
Route::post('/absen/update/{id}', [AttendanceController::class, 'update']);

// Proses Hapus
Route::get('/absen/hapus/{id}', [AttendanceController::class, 'destroy']);


Route::get('/', function () {
    return view('welcome');
});

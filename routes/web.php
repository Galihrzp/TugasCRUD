<?php

use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;

Route::get('/absen', [AttendanceController::class, 'index']); // Untuk buka halaman
Route::post('/absen', [AttendanceController::class, 'store']); // Untuk proses simpan
// Gunakan delete atau get (get lebih simpel untuk pemula agar bisa lari lewat link)
Route::get('/absen/hapus/{id}', [AttendanceController::class, 'destroy']);

Route::get('/', function () {
    return view('welcome');
});

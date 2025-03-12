<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Halaman login (semua bisa akses)
Route::get('/', function () {
    return view('login');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});

// Halaman dashboard (hanya bisa diakses jika sudah login)
/* Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    // Rute untuk admin
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin', function () {
            return "Halo Admin!";
        });
    });

    // Rute untuk mahasiswa
    Route::middleware(['role:mahasiswa'])->group(function () {
        Route::get('/mahasiswa', function () {
            return "Halo Mahasiswa!";
        });
    });

    // Rute untuk dosen
    Route::middleware(['role:dosen'])->group(function () {
        Route::get('/dosen', function () {
            return "Halo Dosen!";
        });
    });
});
*/
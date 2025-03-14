<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\SidangController;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/mahasiswa', [MahasiswaController::class, 'index'])->name('admin.mahasiswa');
    Route::get('/admin/mahasiswa/tambah', [MahasiswaController::class, 'create'])->name('admin.mahasiswa.tambah');
    Route::post('/admin/mahasiswa', [MahasiswaController::class, 'store'])->name('admin.mahasiswa.store');
    Route::get('/admin/hasil-sidang', [HasilSidangController::class, 'index'])->name('admin.hasil_sidang');
    Route::get('/admin/hasil-sidang/tambah', [HasilSidangController::class, 'create'])->name('admin.hasil_sidang.tambah');
    Route::post('/admin/hasil-sidang', [HasilSidangController::class, 'store'])->name('admin.hasil_sidang.store');
    Route::get('/admin/hasil-sidang/edit/{id}', [HasilSidangController::class, 'edit'])->name('admin.hasil_sidang.edit');
    Route::put('/admin/hasil-sidang/{id}', [HasilSidangController::class, 'update'])->name('admin.hasil_sidang.update');
    Route::delete('/admin/hasil-sidang/{id}', [HasilSidangController::class, 'destroy'])->name('admin.hasil_sidang.destroy');
    Route::get('/admin/notifikasi', [NotifikasiController::class, 'index'])->name('admin.notifikasi');
    Route::get('/admin/notifikasi/tambah', [NotifikasiController::class, 'create'])->name('admin.notifikasi.tambah');
    Route::post('/admin/notifikasi', [NotifikasiController::class, 'store'])->name('admin.notifikasi.store');
    Route::get('/admin/notifikasi/edit/{id}', [NotifikasiController::class, 'edit'])->name('admin.notifikasi.edit');
    Route::put('/admin/notifikasi/{id}', [NotifikasiController::class, 'update'])->name('admin.notifikasi.update');
    Route::delete('/admin/notifikasi/{id}', [NotifikasiController::class, 'destroy'])->name('admin.notifikasi.destroy');
});

Route::middleware(['auth', 'mahasiswa'])->group(function () {
    Route::get('/mahasiswa/notifikasi', [MahasiswaController::class, 'notifikasi'])->name('mahasiswa.notifikasi');
    Route::get('/mahasiswa/jadwal', [MahasiswaController::class, 'jadwal'])->name('mahasiswa.jadwal');
});

Route::middleware(['auth', 'dosen'])->group(function () {
    Route::get('/dosen/notifikasi', [DosenController::class, 'notifikasi'])->name('dosen.notifikasi');
    Route::get('/dosen/jadwal', [DosenController::class, 'jadwal'])->name('dosen.jadwal');
    Route::get('/dosen/nilai/{id_sidang}', [DosenController::class, 'nilai'])->name('dosen.nilai');
    Route::post('/dosen/nilai/{id_sidang}', [DosenController::class, 'simpanNilai'])->name('dosen.simpanNilai');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [SidangController::class, 'index'])->name('dashboard');
});


Route::get('/sidang/create', [SidangController::class, 'create']);
Route::post('/sidang', [SidangController::class, 'store']);
Route::get('/sidang/{id}', [SidangController::class, 'show']);
Route::get('/sidang/{id}/edit', [SidangController::class, 'edit']);
Route::put('/sidang/{id}', [SidangController::class, 'update']);
Route::delete('/sidang/{id}', [SidangController::class, 'destroy']);

use App\Http\Controllers\NotifikasiController;

Route::get('/notifikasi', [NotifikasiController::class, 'index']);
Route::post('/notifikasi', [NotifikasiController::class, 'store']);
Route::delete('/notifikasi/{id}', [NotifikasiController::class, 'destroy']);





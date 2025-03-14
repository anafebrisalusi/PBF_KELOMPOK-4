<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Models\Notifikasi;
use App\Models\Sidang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('admin.mahasiswa', compact('mahasiswa'));
    }

    public function notifikasi()
    {
        $notifikasi = Notifikasi::where('NIM', Auth::user()->NIM)->get();
        return view('mahasiswa.notifikasi', compact('notifikasi'));
    }

    public function jadwal()
    {
        $jadwal = Sidang::where('NIM', Auth::user()->NIM)->get();
        return view('mahasiswa.jadwal', compact('jadwal'));
    }

    public function create()
    {
        return view('admin.tambah-mahasiswa');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NIM' => 'required|unique:mahasiswa',
            'nama_mahasiswa' => 'required',
            'email' => 'required|email|unique:users,email',
            'alamat' => 'required',
            'kelas' => 'required',
            'prodi' => 'required',
            'judul_tugasakhir' => 'nullable',
        ]);

        // Simpan data mahasiswa ke tabel mahasiswa
        $mahasiswa = Mahasiswa::create([
            'NIM' => $request->NIM,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'email' => $request->email,
            'kelas' => $request->kelas,
            'prodi' => $request->prodi,
            'judul_tugasakhir' => $request->judul_tugasakhir,
        ]);

        // Buat akun di tabel users
        User::create([
            'username' => $request->NIM, // Username pakai NIM
            'email' => $request->email,
            'password' => Hash::make('password123'), // Password default
            'role' => 'mahasiswa', // Set role sebagai mahasiswa
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa & Akun berhasil dibuat!');
    }
}

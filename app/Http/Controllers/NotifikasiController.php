<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NotifikasiController extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost:8080/notifikasi/');
        $notifikasi = $response->json();
        return view('notifikasi.index', compact('notifikasi'));
    }

    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::all();
        return view('admin.notifikasi.create', compact('mahasiswa', 'dosen'));
    }

    public function store(Request $request)
    {
        Http::post('http://localhost:8080/notifikasi/', [
            'NIM' => $request->NIM,
            'NIDN' => $request->NIDN,
            'pesan' => $request->pesan,
            'tanggal_kirim' => now(),
        ]);

        return redirect('/notifikasi')->with('success', 'Notifikasi dikirim');
    }

    public function edit($id)
    {
        $notifikasi = Notifikasi::findOrFail($id);
        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::all();
        return view('admin.notifikasi.edit', compact('notifikasi', 'mahasiswa', 'dosen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NIM' => 'nullable|exists:mahasiswa,NIM',
            'NIDN' => 'nullable|exists:dosen,NIDN',
            'pesan' => 'required'
        ]);

        $notifikasi = Notifikasi::findOrFail($id);
        $notifikasi->update($request->all());

        return redirect()->route('admin.notifikasi')->with('success', 'Notifikasi berhasil diperbarui.');
    }
    
    public function destroy($id)
    {
        Http::delete("http://localhost:8080/notifikasi/$id");
        return redirect('/notifikasi')->with('success', 'Notifikasi dihapus');
    }
}

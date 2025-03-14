<?php

namespace App\Http\Controllers;

use App\Models\HasilSidang;
use App\Models\Sidang;
use Illuminate\Http\Request;

class HasilSidangController extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost:8080/hasil_sidang');
        $dosen = $response->json();
        return view('dashboard', compact('dosen'));
    }

    public function create()
    {
        $sidang = Sidang::all();
        return view('admin.hasil_sidang.create', compact('sidang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_sidang' => 'required|exists:sidang,id_sidang',
            'nilai' => 'required',
            'catatan' => 'nullable'
        ]);

        HasilSidang::create($request->all());

        return redirect()->route('admin.hasil_sidang')->with('success', 'Hasil sidang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $hasilSidang = HasilSidang::findOrFail($id);
        $sidang = Sidang::all();
        return view('admin.hasil_sidang.edit', compact('hasilSidang', 'sidang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_sidang' => 'required|exists:sidang,id_sidang',
            'nilai' => 'required',
            'catatan' => 'nullable'
        ]);

        $hasilSidang = HasilSidang::findOrFail($id);
        $hasilSidang->update($request->all());

        return redirect()->route('admin.hasil_sidang')->with('success', 'Hasil sidang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $hasilSidang = HasilSidang::findOrFail($id);
        $hasilSidang->delete();

        return redirect()->route('admin.hasil_sidang')->with('success', 'Hasil sidang berhasil dihapus.');
    }
}

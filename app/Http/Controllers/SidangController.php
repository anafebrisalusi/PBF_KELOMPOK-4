<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SidangController extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost:8080/sidang/');
        $sidang = $response->json();
        return view('dashboard', compact('sidang'));
    }

    public function create()
    {
        return view('sidang.create'); 
    }

    public function store(Request $request)
    {
        Http::post('http://localhost:8080/sidang/', [
            'NIM' => $request->NIM,
            'NIDN' => $request->NIDN,
            'waktu_sidang' => $request->waktu_sidang,
            'ruang_sidang' => $request->ruang_sidang,
        ]);

        return redirect('/dashboard')->with('success', 'Sidang berhasil ditambahkan');
    }

    public function show($id)
    {
        $response = Http::get("http://localhost:8080/sidang/$id");
        $sidang = $response->json();
        return view('sidang.show', compact('sidang'));
    }

    public function edit($id)
    {
        $response = Http::get("http://localhost:8080/sidang/$id");
        $sidang = $response->json();
        return view('sidang.edit', compact('sidang'));
    }

    public function update(Request $request, $id)
    {
        Http::put("http://localhost:8080/sidang/$id", [
            'NIM' => $request->NIM,
            'NIDN' => $request->NIDN,
            'waktu_sidang' => $request->waktu_sidang,
            'ruang_sidang' => $request->ruang_sidang,
        ]);

        return redirect('/dashboard')->with('success', 'Sidang berhasil diperbarui');
    }

    public function destroy($id)
    {
        Http::delete("http://localhost:8080/sidang/$id");
        return redirect('/dashboard')->with('success', 'Sidang berhasil dihapus');
    }
}

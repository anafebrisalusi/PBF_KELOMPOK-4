@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Daftar Mahasiswa</h2>
    <a href="{{ route('admin.mahasiswa.tambah') }}" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Prodi</th>
                <th>Judul Tugas Akhir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswa as $mhs)
            <tr>
                <td>{{ $mhs->NIM }}</td>
                <td>{{ $mhs->nama_mahasiswa }}</td>
                <td>{{ $mhs->kelas }}</td>
                <td>{{ $mhs->prodi }}</td>
                <td>{{ $mhs->judul_tugasakhir ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

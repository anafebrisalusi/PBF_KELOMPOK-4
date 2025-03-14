@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Tambah Mahasiswa</h2>

    <form action="{{ route('admin.mahasiswa.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="NIM" class="form-label">NIM</label>
            <input type="text" class="form-control" name="NIM" required>
        </div>
        <div class="mb-3">
            <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" name="nama_mahasiswa" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" name="alamat" required>
        </div>
        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" class="form-control" name="kelas" required>
        </div>
        <div class="mb-3">
            <label for="prodi" class="form-label">Prodi</label>
            <input type="text" class="form-control" name="prodi" required>
        </div>
        <div class="mb-3">
            <label for="judul_tugasakhir" class="form-label">Judul Tugas Akhir</label>
            <input type="text" class="form-control" name="judul_tugasakhir">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection

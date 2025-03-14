@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Tambah Notifikasi</h2>
    <form action="{{ route('admin.notifikasi.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Pilih Penerima</label>
            <select name="NIM" class="form-control">
                <option value="">-- Pilih Mahasiswa --</option>
                @foreach($mahasiswa as $m)
                <option value="{{ $m->NIM }}">{{ $m->nama_mahasiswa }}</option>
                @endforeach
            </select>
            <select name="NIDN" class="form-control mt-2">
                <option value="">-- Pilih Dosen --</option>
                @foreach($dosen as $d)
                <option value="{{ $d->NIDN }}">{{ $d->nama_dosen }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Pesan</label>
            <textarea name="pesan" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim Notifikasi</button>
    </form>
</div>
@endsection

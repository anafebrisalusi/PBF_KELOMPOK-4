@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Tambah Sidang</h4>
    <form method="POST" action="{{ url('/sidang') }}">
        @csrf
        <div class="mb-3">
            <label>ID Sidang</label>
            <input type="text" name="id_sidang" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>NIM</label>
            <input type="text" name="NIM" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>NIDN</label>
            <input type="text" name="NIDN" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Waktu Sidang</label>
            <input type="datetime-local" name="waktu_sidang" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Ruang Sidang</label>
            <input type="text" name="ruang_sidang" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Tambah Sidang</button>
    </form>
</div>
@endsection

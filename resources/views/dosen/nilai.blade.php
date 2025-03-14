@extends('layouts.dosen')

@section('content')
<div class="container">
    <h2>Beri Nilai Sidang</h2>
    <form action="{{ route('dosen.simpanNilai', $sidang->id_sidang) }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nilai</label>
            <input type="number" name="nilai" class="form-control" min="0" max="100" required>
        </div>
        <div class="form-group">
            <label>Catatan</label>
            <textarea name="catatan" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection

@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Tambah Hasil Sidang</h2>
    <form action="{{ route('admin.hasil_sidang.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Sidang</label>
            <select name="id_sidang" class="form-control">
                @foreach($sidang as $s)
                <option value="{{ $s->id_sidang }}">{{ $s->id_sidang }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Nilai</label>
            <input type="text" name="nilai" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Catatan</label>
            <textarea name="catatan" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

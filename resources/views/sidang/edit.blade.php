@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Edit Sidang</h4>
    <form method="POST" action="{{ url('/sidang/' . $sidang['id_sidang']) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>NIM</label>
            <input type="text" name="NIM" class="form-control" value="{{ $sidang['NIM'] }}" required>
        </div>
        <div class="mb-3">
            <label>NIDN</label>
            <input type="text" name="NIDN" class="form-control" value="{{ $sidang['NIDN'] }}" required>
        </div>
        <div class="mb-3">
            <label>Waktu Sidang</label>
            <input type="datetime-local" name="waktu_sidang" class="form-control" value="{{ $sidang['waktu_sidang'] }}" required>
        </div>
        <div class="mb-3">
            <label>Ruang Sidang</label>
            <input type="text" name="ruang_sidang" class="form-control" value="{{ $sidang['ruang_sidang'] }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Sidang</button>
    </form>
</div>
@endsection

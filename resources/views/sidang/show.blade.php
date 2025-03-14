@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Detail Sidang</h4>
    <p><strong>ID Sidang:</strong> {{ $sidang['id_sidang'] }}</p>
    <p><strong>NIM:</strong> {{ $sidang['NIM'] }}</p>
    <p><strong>NIDN:</strong> {{ $sidang['NIDN'] }}</p>
    <p><strong>Waktu Sidang:</strong> {{ $sidang['waktu_sidang'] }}</p>
    <p><strong>Ruang Sidang:</strong> {{ $sidang['ruang_sidang'] }}</p>
    <a href="{{ url('/dashboard') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection

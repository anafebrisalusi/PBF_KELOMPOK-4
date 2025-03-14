@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Daftar Sidang</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Sidang</th>
                <th>NIM</th>
                <th>NIDN</th>
                <th>Waktu</th>
                <th>Ruang</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sidang as $s)
            <tr>
                <td>{{ $s['id_sidang'] }}</td>
                <td>{{ $s['NIM'] }}</td>
                <td>{{ $s['NIDN'] }}</td>
                <td>{{ $s['waktu_sidang'] }}</td>
                <td>{{ $s['ruang_sidang'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

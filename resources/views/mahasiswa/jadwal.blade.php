@extends('layouts.mahasiswa')

@section('content')
<div class="container">
    <h2>Jadwal Sidang</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Waktu Sidang</th>
                <th>Ruang Sidang</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jadwal as $j)
            <tr>
                <td>{{ $j->waktu_sidang }}</td>
                <td>{{ $j->ruang_sidang }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

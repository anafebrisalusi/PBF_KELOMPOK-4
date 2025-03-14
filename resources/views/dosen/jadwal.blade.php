@extends('layouts.dosen')

@section('content')
<div class="container">
    <h2>Jadwal Sidang</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Mahasiswa</th>
                <th>Waktu Sidang</th>
                <th>Ruang Sidang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jadwal as $j)
            <tr>
                <td>{{ $j->mahasiswa->nama_mahasiswa }}</td>
                <td>{{ $j->waktu_sidang }}</td>
                <td>{{ $j->ruang_sidang }}</td>
                <td>
                    <a href="{{ route('dosen.nilai', $j->id_sidang) }}" class="btn btn-primary">Beri Nilai</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

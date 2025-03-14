@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Notifikasi Sidang</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Notifikasi</th>
                <th>NIM</th>
                <th>NIDN</th>
                <th>Pesan</th>
                <th>Tanggal Kirim</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notifikasi as $n)
            <tr>
                <td>{{ $n['id_notifikasi'] }}</td>
                <td>{{ $n['NIM'] }}</td>
                <td>{{ $n['NIDN'] }}</td>
                <td>{{ $n['pesan'] }}</td>
                <td>{{ $n['tanggal_kirim'] }}</td>
                <td>
                    <form action="{{ url('/notifikasi/' . $n['id_notifikasi']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

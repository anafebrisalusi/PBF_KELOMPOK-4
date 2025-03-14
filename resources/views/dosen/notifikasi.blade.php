@extends('layouts.dosen')

@section('content')
<div class="container">
    <h2>Notifikasi Sidang</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Pesan</th>
                <th>Tanggal Kirim</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notifikasi as $notif)
            <tr>
                <td>{{ $notif->pesan }}</td>
                <td>{{ $notif->tanggal_kirim }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

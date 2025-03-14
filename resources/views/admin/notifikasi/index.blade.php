@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Daftar Notifikasi</h2>
    <a href="{{ route('admin.notifikasi.tambah') }}" class="btn btn-primary">Tambah Notifikasi</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Penerima</th>
                <th>Pesan</th>
                <th>Tanggal Kirim</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notifikasi as $notif)
            <tr>
                <td>
                    @if($notif->NIM)
                        Mahasiswa ({{ $notif->NIM }})
                    @elseif($notif->NIDN)
                        Dosen ({{ $notif->NIDN }})
                    @endif
                </td>
                <td>{{ $notif->pesan }}</td>
                <td>{{ $notif->tanggal_kirim }}</td>
                <td>
                    <a href="{{ route('admin.notifikasi.edit', $notif->id_notifikasi) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.notifikasi.destroy', $notif->id_notifikasi) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

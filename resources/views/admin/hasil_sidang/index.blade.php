@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Hasil Sidang</h2>
    <a href="{{ route('admin.hasil_sidang.tambah') }}" class="btn btn-primary">Tambah Hasil Sidang</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID Sidang</th>
                <th>Nilai</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hasilSidang as $hasil)
            <tr>
                <td>{{ $hasil->id_sidang }}</td>
                <td>{{ $hasil->nilai }}</td>
                <td>{{ $hasil->catatan }}</td>
                <td>
                    <a href="{{ route('admin.hasil_sidang.edit', $hasil->id_hasil) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.hasil_sidang.destroy', $hasil->id_hasil) }}" method="POST" style="display:inline;">
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

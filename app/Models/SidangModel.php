<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sidang extends Model
{
    use HasFactory;

    protected $table = 'sidang'; // Nama tabel di database
    protected $primaryKey = 'id_sidang'; // Primary key dari tabel

    // Kolom yang boleh diisi (mass assignment)
    protected $fillable = ['NIM', 'NIDN', 'waktu_sidang', 'ruang_sidang'];

    // Jika tabel tidak menggunakan created_at & updated_at
    public $timestamps = false;

    // Relasi ke tabel Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'NIM', 'NIM');
    }

    // Relasi ke tabel Dosen
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'NIDN', 'NIDN');
    }

    // Relasi ke tabel Hasil Sidang
    public function hasilSidang()
    {
        return $this->hasOne(HasilSidang::class, 'id_sidang', 'id_sidang');
    }
}

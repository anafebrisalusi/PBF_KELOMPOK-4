<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    protected $table = 'notifikasi'; // Nama tabel di database
    protected $primaryKey = 'id_notifikasi'; // Primary key dari tabel

    // Kolom yang boleh diisi (mass assignment)
    protected $fillable = ['NIM', 'NIDN', 'pesan', 'tanggal_kirim'];

    // Jika tabel menggunakan timestamps (created_at & updated_at)
    public $timestamps = false; 

    // Relasi ke tabel Mahasiswa (Opsional)
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'NIM', 'NIM');
    }

    // Relasi ke tabel Dosen (Opsional)
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'NIDN', 'NIDN');
    }
}

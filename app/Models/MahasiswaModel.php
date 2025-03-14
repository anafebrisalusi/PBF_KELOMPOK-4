<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'NIM';
    public $incrementing = false;
    protected $fillable = ['NIM', 'nama_mahasiswa', 'email', 'alamat', 'kelas', 'prodi', 'judul_tugasakhir'];
}

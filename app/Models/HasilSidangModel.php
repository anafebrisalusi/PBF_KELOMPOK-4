<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilSidangModel extends Model
{
    protected $table = 'hasil_sidang';
    protected $primaryKey = 'id_hasil'; 
    protected $fillable = ['id_sidang', 'nilai', 'catatan']; 
}

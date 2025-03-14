<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DosenModel extends Model
{
    protected $table = 'dosen';

    protected $fillable = ['NIDN', 'nama_dosen'];
}

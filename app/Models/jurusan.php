<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    use Hasfaktory;
    PROTECTED $table = 'jurusan';
    protected $fillable = [
        'kode_jurusan',
        'nama_jurusan',
        'keterangan',
        'status'
    ];
}

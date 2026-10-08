<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Hasfaktory;

class jurusan extends Model
{
    use Hasfactory;
    PROTECTED $table = 'jurusans';
    protected $fillable = 
    [
        'kode_jurusan',
        'nama_jurusan',
        'keterangan',
        'status'
    ];
}

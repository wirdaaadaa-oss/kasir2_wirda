<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Hasfactory;


class jenjang extends Model
{
    use Hasfactory;
    PROTECTED $table = 'jenjangs';
    protected $fillable = 
    [
        'nama_jenjang',
        'keterangan',
    ];
}


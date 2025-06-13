<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanaman extends Model
{
    protected $table = 'tanaman';
    protected $fillable = [
        'Authorization',
        'nama_tanaman',
        'nama_latin',
        'gambar',
    ];
}

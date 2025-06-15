<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamus extends Model
{
    protected $table = 'kamus';
    protected $fillable = [
        'Authorization',
        'bahasaIndonesia',
        'bahasaInggris',
        'gambar'
    ];
}

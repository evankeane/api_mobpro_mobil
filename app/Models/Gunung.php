<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gunung extends Model
{
    protected $table = 'gunung';
    protected $fillable = [
        'Authorization',
        'nama',
        'ketinggian',
        'foto',
    ];
}

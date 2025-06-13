<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Crypto extends Model
{
    protected $table = 'crypto_api';

    protected $fillable = [
        'Authorization',
        'nama',
        'harga',
        'foto',
    ];
}

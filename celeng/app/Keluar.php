<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keluar extends Model
{
        protected $fillable = [
        'uid','nominal', 'keterangan', 'created_at',
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masuk extends Model
{
	public $timestamps = false;

    protected $fillable = [
        'uid','nominal', 'keterangan', 'tanggal'
    ];
}

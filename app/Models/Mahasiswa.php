<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    public function matakuliahs()
    {
        return $this->belongsToMany('App\Models\Matakuliah')->withTimestamps();
    }
}

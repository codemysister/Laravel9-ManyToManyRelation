<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    public function mahasiswas()
    {
        return $this->belongsToMany('App\Models\Mahasiswa')->withTimestamps();
    }
}

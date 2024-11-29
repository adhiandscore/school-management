<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = ['nama'];

    // Relasi dengan Kelas
    public function gurus()
    {
        return $this->belongsToMany(Guru::class, 'kelas_guru');
    }



}

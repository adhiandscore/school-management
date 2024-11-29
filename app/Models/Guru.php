<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = ['nama'];

    // Relasi dengan Kelas
    public function kelass()
    {
        return $this->belongsToMany(Kelas::class, 'kelas_guru'); // Misalkan ada tabel pivot kelas_guru
    }
}

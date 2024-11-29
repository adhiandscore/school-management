<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = ['nama_kelas'];

    // Relasi dengan Siswa
    public function siswas()
    {
        return $this->hasMany(Siswa::class);
    }

    // Relasi dengan Guru
    public function gurus()
    {
        return $this->belongsToMany(Guru::class, 'kelas_guru'); // Misalkan ada tabel pivot kelas_guru
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = ['nama_kelas'];

    public function siswas()
    {
        return $this->hasMany(Siswa::class, 'kelas_id'); // Relasi one-to-many dengan tabel siswa
    }

    // Relasi dengan Siswa
    public function getSiswaCountAttribute()
    {
        return $this->siswas->count() ?: 0;
    }

    // Relasi dengan Guru
    public function gurus()
    {
        return $this->belongsToMany(Guru::class, 'kelas_guru');
    }

    public function getNamaKelasAttribute($value)
    {
        return $value ?: 'Tidak diketahui';
    }

}

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

    public function kelases()
{
    return $this->belongsToMany(Kelas::class, 'guru_kelas', 'guru_id', 'kelas_id');
}

    // Relasi dengan Siswa
    public function getSiswaCountAttribute()
    {
        return $this->siswas->count() ?: 0;
    }

    // Relasi dengan Guru
    public function gurus()
    {
        return $this->belongsToMany(Guru::class, 'guru_kelas', 'kelas_id', 'guru_id');
    }

    public function getNamaKelasAttribute($value)
    {
        return $value ?: 'Tidak diketahui';
    }

}

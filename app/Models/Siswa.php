<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{

    protected $fillable = ['nama', 'nis', 'kelas_id'];

    protected $attributes = [
        'kelas_id' => null, 
    ];


    public function getSiswaCountAttribute()
    {
        return $this->whereNotNull('id')->count() ?: 0;
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class)->withDefault([
            'nama' => 'Belum ada kelas', 
        ]);
    }


    public function getNamaSiswaAttribute()
    {
        return $this->nama ?? 'Nama tidak tersedia';
    }


    public function getNisSiswaAttribute()
    {
        return $this->nis ?? 'NIS tidak tersedia';
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = ['nama'];

    // Accessor untuk mendapatkan nama-nama kelas yang diajar
    public function getGuruNamesAttribute()
    {
        return $this->kelases->pluck('nama')->join(', ') ?: 'Belum ada guru';
    }
}

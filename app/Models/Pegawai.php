<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pegawai extends Authenticatable
{
    use Notifiable;

    protected $table = 'pegawai';

    protected $fillable = [
        'pengguna',
        'password',
        'nama',
        'nip',
        'jabatan',
        'eselon',
        'nama_satker',
        'no_hp',
        'tmt_pensiun'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'tmt_pensiun' => 'date',
    ];

    // Relasi 1 Pegawai = 1 Aset
    public function aset()
    {
        return $this->hasOne(Aset::class);
    }
}
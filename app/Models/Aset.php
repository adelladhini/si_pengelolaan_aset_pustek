<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    use HasFactory;

    protected $table = 'aset';

    protected $fillable = [
        'nama_tablet',
        'serial_number',
        'imei',
        'kondisi',
        'status',
        'pegawai_id'
    ];

    // Relasi ke Pegawai (1 tablet milik 1 pegawai)
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}

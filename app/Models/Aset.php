<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    use HasFactory;

    protected $table = 'aset';

    protected $fillable = [
        'kode_bmn',
        'nama_aset',
        'serial_number',
        'imei',
        'tahun_pengadaan',
        'kondisi',
        'status',
        'pegawai_id',
        'keterangan'
    ];

    // Relasi ke Pegawai
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    use HasFactory;

    protected $table = 'aset';

    protected $fillable = [
        'kode_aset',
        'nama_aset',
        'merk',
        'serial_number',
        'imei',
        'tahun_pengadaan',
        'kondisi',
        'status'
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // Aset memiliki banyak transaksi
    public function transaksiAset()
    {
        return $this->hasMany(TransaksiAset::class);
    }

    public function transaksi()
    {
        return $this->hasMany(TransaksiAset::class);
    }
}
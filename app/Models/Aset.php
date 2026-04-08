<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\TransaksiAset;

class Aset extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'aset';

    protected $fillable = [
        'kode_bmn',
        'tipe',
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

    // Relasi ke transaksi aset
    public function transaksiAset()
    {
        return $this->hasMany(TransaksiAset::class);
    }
}
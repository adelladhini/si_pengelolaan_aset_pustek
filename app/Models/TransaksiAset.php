<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiAset extends Model
{
    use HasFactory;

    protected $table = 'transaksi_aset';

    protected $fillable = [
        'pegawai_id',
        'aset_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'kondisi_awal',
        'kondisi_kembali',
        'status'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    // relasi ke tabel aset
    public function aset()
    {
        return $this->belongsTo(Aset::class);
    }

    // relasi ke tabel pegawai
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
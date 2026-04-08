<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Aset;
use App\Models\Pegawai;

class TransaksiAset extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transaksi_aset';

    protected $fillable = [
        'pegawai_id',
        'aset_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'kondisi_awal',
        'kondisi_kembali',
        'bukti_peminjaman',
        'bukti_pengembalian',
        'status'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    // Relasi ke Aset
    public function aset()
    {
        return $this->belongsTo(Aset::class);
    }

    // Relasi ke Pegawai
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
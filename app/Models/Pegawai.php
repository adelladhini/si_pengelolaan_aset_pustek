<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    protected $fillable = [
        'nip',
        'nama',
        'jabatan',
        'unit_kerja',
        'no_hp',
        'email',
        'tmt_pensiun',
    ];

    protected $casts = [
        'tmt_pensiun' => 'date',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    // Pegawai memiliki banyak transaksi aset
    public function transaksiAset()
    {
        return $this->hasMany(TransaksiAset::class);
    }

    /*
    |--------------------------------------------------------------------------
    | STATUS OTOMATIS BERDASARKAN TMT PENSIUN
    |--------------------------------------------------------------------------
    */

    public function getStatusTextAttribute()
    {
        if ($this->tmt_pensiun && Carbon::today()->gte($this->tmt_pensiun)) {
            return 'Nonaktif';
        }

        return 'Aktif';
    }

    /*
    |--------------------------------------------------------------------------
    | STATUS BADGE
    |--------------------------------------------------------------------------
    */

    public function getStatusBadgeAttribute()
    {
        if ($this->status_text === 'Nonaktif') {
            return '<span class="badge bg-danger">Nonaktif</span>';
        }

        return '<span class="badge bg-success">Aktif</span>';
    }

    public function transaksi()
    {
        return $this->hasMany(TransaksiAset::class);
    }
}
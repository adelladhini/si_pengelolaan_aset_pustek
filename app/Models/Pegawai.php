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
        'nama',
        'nip',
        'jabatan',       // manual string
        'satker_id',
        'user_id',       // PENTING kalau ada relasi user
        'no_hp',
        'tmt_pensiun',
    ];

    protected $casts = [
        'tmt_pensiun' => 'date',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    // Relasi ke Satker
    public function satker()
    {
        return $this->belongsTo(Satker::class, 'satker_id');
    }

    // Relasi ke Aset
    public function aset()
    {
        return $this->hasOne(Aset::class, 'pegawai_id');
    }

    // Relasi ke User Login (FK ada di pegawai)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
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
}
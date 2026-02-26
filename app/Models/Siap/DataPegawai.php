<?php

namespace App\Models\Siap;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ortala\Jabatan;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DataPegawai extends Authenticatable
{
    use HasFactory;

    protected $table= 'data_pegawai';
    public $incrementing = true;
    protected $guarded = [];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }
}

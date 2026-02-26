<?php

namespace App\Models\DataRefrensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKendaraan extends Model
{
    use HasFactory;
    protected $table = 'jenis_kendaraan';
    public $incrementing = true;
    protected $guarded = [];
    public $timestamps = false;
}

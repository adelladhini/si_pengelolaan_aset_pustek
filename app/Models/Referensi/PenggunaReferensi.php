<?php

namespace App\Models\Referensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenggunaReferensi extends Model
{
    use HasFactory;
    protected $table = 'pengguna';
    public $incrementing = true;
    protected $guarded = [];
    public $timestamps = false;
}

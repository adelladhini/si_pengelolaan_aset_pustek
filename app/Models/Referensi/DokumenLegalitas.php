<?php

namespace App\Models\Referensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenLegalitas extends Model
{
    use HasFactory;
    protected $table = 'dokumen';
    public $incrementing = true;
    protected $guarded = [];
    public $timestamps = false;
}

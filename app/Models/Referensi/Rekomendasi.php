<?php

namespace App\Models\Referensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekomendasi extends Model
{
    use HasFactory;
    protected $table = 'rekomendasi';
    public $incrementing = true;
    protected $guarded = [];
    public $timestamps = false;
}

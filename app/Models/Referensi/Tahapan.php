<?php

namespace App\Models\Referensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahapan extends Model
{
    use HasFactory;
    protected $table = 'tahapan';
    public $incrementing = true;
    protected $guarded = [];
    public $timestamps = false;
}

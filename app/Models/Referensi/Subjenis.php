<?php

namespace App\Models\Referensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjenis extends Model
{
    use HasFactory;
    protected $table = 'subjenis';
    public $incrementing = true;
    protected $guarded = [];
    public $timestamps = false;
}

<?php

namespace App\Models\Referensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kesimpulan extends Model
{
    use HasFactory;
    protected $table = 'kesimpulan';
    public $incrementing = true;
    protected $guarded = [];
    public $timestamps = false;
}

<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satker extends Model
{
    use HasFactory;
    protected $table = 'satker';
    public $incrementing = true;
    protected $guarded = [];
    public $timestamps = false;
}

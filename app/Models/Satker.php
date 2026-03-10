<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Satker extends Model
{
    use HasFactory;

    protected $table = 'satker';

    protected $fillable = [
        'nama_satker',
    ];

    public function pegawais()
    {
        return $this->hasMany(Pegawai::class, 'satker_id');
    }
}
<?php

namespace App\Models\Transaksi;
use App\Models\Referensi\Jenis;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usulan extends Model
{
    use HasFactory;
    protected $table = 'usulan';
    public $incrementing = true;
    protected $guarded = [];
    public $timestamps = false;

    public function satker()
    {
        return $this->belongsTo(Satker::class, 'id');
    }

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'id');
    }
}

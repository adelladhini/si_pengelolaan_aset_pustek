<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $connection = 'db_akd';
    protected $table = 'menu';

    protected $fillable = [
        'id',
        'title',
        'urutan',
        'status_sileg',
        'status',
        'user_input',
        'tanggal_input',
        'user_update',
        'tanggal_update',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($audit) {
            $audit->user_input = auth()->user()->nama;
            $audit->tanggal_input = now();
        });

        static::updating(function ($audit) {
            $audit->user_update = auth()->user()->nama;
            $audit->tanggal_update = now();
        });
    }


    public $timestamps = false;
}

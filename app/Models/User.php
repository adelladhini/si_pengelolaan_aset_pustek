<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user';

    protected $fillable = [
        'id_pegawai',
        'id_website',
        'id_satker',
        'password',
        'role',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'nama',
        'email',
        'jabatan',
        'lembaga',
        'foto',
        'deskripsi',
        'cv',
        'nip',
        'tim',
        'bidang_peminatan',
        'riwayat_pendidikan',
        'aktivitas',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($audit) {
            $audit->created_by = auth()->user()->nama;
        });

        static::updating(function ($audit) {
            $audit->updated_by = auth()->user()->nama;
        });
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
    // Di dalam model User.php
    public function hasRole($role)
    {
        return $this->role === $role;
    }
    public function website()
    {
        return $this->belongsTo(\App\Models\Website::class, 'id_website');
    }

}

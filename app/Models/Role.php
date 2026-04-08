<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // 👈 opsional

class Role extends Model
{
    use SoftDeletes; // 👈 opsional (disarankan kalau role tidak boleh hilang)

    protected $table = 'roles'; // 👈 pastikan sesuai nama tabel

    protected $fillable = ['nama_role'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
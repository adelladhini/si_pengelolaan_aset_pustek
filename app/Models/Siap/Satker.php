<?php

namespace App\Models\Siap;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satker extends Model
{
    use HasFactory;
    protected $connection = 'mysql_siap';

    protected $table= 'satker';
    protected $guarded = [];
}

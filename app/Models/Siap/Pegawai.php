<?php

namespace App\Models\Siap;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Pegawai extends Authenticatable
{

   protected $table = 'pegawai';
   public $incrementing = true;
   protected $guarded = [];
   public $timestamps = false;


}

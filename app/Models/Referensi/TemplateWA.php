<?php

namespace App\Models\Referensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateWA extends Model
{
    use HasFactory;
    protected $table = 'template';
    public $incrementing = true;
    protected $guarded = [];
    public $timestamps = false;
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Aset;

class AdminController extends Controller
{
    public function index()
{
$totalPegawai = Pegawai::count();
$totalAset = Aset::count();

$asetTerpakai = Aset::where('status','Digunakan')->count();
$asetBelum = Aset::where('status','Tersedia')->count();

$asetBaik = Aset::where('kondisi','Baik')->count();
$asetRusakRingan = Aset::where('kondisi','Rusak Ringan')->count();
$asetRusakBerat = Aset::where('kondisi','Rusak Berat')->count();

return view('admin.index', compact(
    'totalPegawai',
    'totalAset',
    'asetTerpakai',
    'asetBelum',
    'asetBaik',
    'asetRusakRingan',
    'asetRusakBerat'
));
}
}
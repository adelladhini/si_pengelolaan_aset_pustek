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
        $asetTerpakai = Aset::whereNotNull('pegawai_id')->count();
        $asetBelumTerpakai = Aset::whereNull('pegawai_id')->count();

        return view('admin.index', compact(
            'totalPegawai',
            'totalAset',
            'asetTerpakai',
            'asetBelumTerpakai'
        ));
    }
} 
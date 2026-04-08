<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Aset;
use App\Models\TransaksiAset;
use Carbon\Carbon;

class DashboardController extends Controller
{
public function index(Request $request)
{
    /*
    ==========================================
    DATA UTAMA
    ==========================================
    */

    $totalPegawai = Pegawai::count();
    $totalAset = Aset::count();

    $asetTerpakai = TransaksiAset::whereNull('tanggal_kembali')->count();
    $asetBelum = Aset::where('status','Tersedia')->count();


    /*
    ==========================================
    KONDISI ASET
    ==========================================
    */

    $asetBaik = Aset::where('kondisi','Baik')->count();
    $asetRusakRingan = Aset::where('kondisi','Rusak Ringan')->count();
    $asetRusakBerat = Aset::where('kondisi','Rusak Berat')->count();
    $asetRusak = Aset::where('kondisi','Rusak Ringan')
                    ->orWhere('kondisi','Rusak Berat')
                    ->count();
    $asetHilang = Aset::where('kondisi','Hilang')->count();


    /*
    ==========================================
    PEGAWAI MEMEGANG TABLET
    ==========================================
    */

    $pegawaiMemegangTablet = TransaksiAset::whereNull('tanggal_kembali')
                            ->distinct('pegawai_id')
                            ->count('pegawai_id');


    /*
    ==========================================
    TRANSAKSI TERBARU
    ==========================================
    */

    $transaksiTerbaru = TransaksiAset::with(['pegawai','aset'])
                        ->latest()
                        ->take(5)
                        ->get();


    /*
    ==========================================
    GRAFIK PEMINJAMAN BULANAN (FIX)
    ==========================================
    */

    $tahun = $request->tahun ?? date('Y');

    $dataRaw = TransaksiAset::selectRaw('MONTH(tanggal_pinjam) as bulan, COUNT(*) as total')
        ->whereYear('tanggal_pinjam', $tahun)
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->pluck('total','bulan')
        ->toArray();

    $namaBulan = [
        1=>'Jan',2=>'Feb',3=>'Mar',4=>'Apr',5=>'Mei',6=>'Jun',
        7=>'Jul',8=>'Agu',9=>'Sep',10=>'Okt',11=>'Nov',12=>'Des'
    ];

    $labels = [];
    $data = [];

    for ($i = 1; $i <= 12; $i++) {
        $labels[] = $namaBulan[$i];
        $data[] = $dataRaw[$i] ?? 0;
    }


    /*
    ==========================================
    NOTIF PEGAWAI AKAN PENSIUN
    ==========================================
    */

    $notifPensiun = Pegawai::whereDate('tmt_pensiun','<=', Carbon::now()->addDays(7))
        ->whereDate('tmt_pensiun','>=', Carbon::now())
        ->whereHas('transaksiAset', function ($q) {
            $q->whereNull('tanggal_kembali');
        })
        ->get();


    /*
    ==========================================
    RETURN VIEW (SATU SAJA!)
    ==========================================
    */

    return view('dashboard.index', compact(
        'totalPegawai',
        'totalAset',
        'asetTerpakai',
        'asetBelum',
        'asetBaik',
        'asetRusakRingan',
        'asetRusakBerat',
        'asetRusak',
        'asetHilang',
        'pegawaiMemegangTablet',
        'transaksiTerbaru',
        'notifPensiun',
        'labels',
        'data',
        'tahun'
    ));
}
}
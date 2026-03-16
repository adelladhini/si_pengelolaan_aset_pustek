<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Aset;
use App\Models\TransaksiAset;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {

        /*
        ==========================================
        DATA UTAMA
        ==========================================
        */

        $totalPegawai = Pegawai::count();
        $totalAset = Aset::count();

        // aset yang sedang dipakai (belum dikembalikan)
        $asetTerpakai = TransaksiAset::whereNull('tanggal_kembali')->count();

        // aset yang tersedia
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
        GRAFIK PEMINJAMAN BULANAN
        ==========================================
        */

        $peminjamanBulanan = TransaksiAset::selectRaw("
                DATE_FORMAT(tanggal_pinjam,'%b') as bulan,
                COUNT(*) as total,
                MIN(tanggal_pinjam) as urut
            ")
            ->groupBy('bulan')
            ->orderBy('urut')
            ->pluck('total','bulan');


        /*
        ==========================================
        NOTIF PEGAWAI AKAN PENSIUN (30 HARI)
        ==========================================
        */

        $notifPensiun = Pegawai::whereDate('tmt_pensiun','<=', Carbon::now()->addDays(30))
        ->whereDate('tmt_pensiun','>=', Carbon::now())
        ->whereHas('transaksiAset', function ($q) {
            $q->whereNull('tanggal_kembali');
        })
        ->get();


        /*
        ==========================================
        RETURN VIEW
        ==========================================
        */

        return view('admin.index', compact(
            'totalPegawai',
            'totalAset',
            'asetTerpakai',
            'asetBelum',
            'asetBaik',
            'asetRusakRingan',
            'asetRusakBerat',
            'asetRusak',
            'pegawaiMemegangTablet',
            'transaksiTerbaru',
            'peminjamanBulanan',
            'notifPensiun'
        ));
    }
}
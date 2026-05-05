<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TransaksiAset;

class Laporan extends Model
{
    // ini bukan tabel, jadi kita disable
    protected $table = null;
    public $timestamps = false;

    // ambil data laporan
    public static function getData($request)
    {
        $query = TransaksiAset::with(['pegawai', 'aset']);

        // filter tanggal
        if ($request->from && $request->to) {
            $query->whereBetween('tanggal_pinjam', [
                $request->from,
                $request->to
            ]);
        }

        // filter status
        if ($request->status) {
            $query->where('status', $request->status);
        }

        return $query->latest()->get();
    }
}
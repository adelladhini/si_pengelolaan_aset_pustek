<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransaksiAset;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $data = $this->getFilteredData($request);

        return view('laporan.index', compact('data'));
    }

    public function export(Request $request)
    {
        $data = $this->getFilteredData($request);

        $filename = "laporan_aset_" . date('Ymd_His') . ".csv";

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
        ];

        $callback = function () use ($data) {
            $file = fopen('php://output', 'w');

            // Header CSV
            fputcsv($file, [
                'No',
                'Pegawai',
                'Aset',
                'Tanggal Pinjam',
                'Tanggal Kembali',
                'Status'
            ]);

            foreach ($data as $i => $row) {
                fputcsv($file, [
                    $i + 1,
                    $row->pegawai->nama ?? '-',
                    $row->aset->nama ?? '-',

                    // format tanggal biar rapi
                    $row->tanggal_pinjam 
                        ? Carbon::parse($row->tanggal_pinjam)->format('d-m-Y') 
                        : '-',

                    $row->tanggal_kembali 
                        ? Carbon::parse($row->tanggal_kembali)->format('d-m-Y') 
                        : '-',

                    ucfirst($row->status) // biar kapital depan
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    // 🔥 Central Query (biar clean & reusable)
    private function getFilteredData($request)
    {
        $query = TransaksiAset::with(['pegawai', 'aset']);

        // filter tanggal
        if ($request->filled('from') && $request->filled('to')) {
            $query->whereBetween('tanggal_pinjam', [
                $request->from,
                $request->to
            ]);
        }

        // filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        return $query->latest()->get();
    }
}
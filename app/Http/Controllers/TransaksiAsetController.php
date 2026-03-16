<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiAset;
use App\Models\Pegawai;
use App\Models\Aset;

class TransaksiAsetController extends Controller
{
    public function index()
    {
        $transaksi = TransaksiAset::with(['pegawai','aset'])
                    ->latest()
                    ->get();

        return view('transaksi_aset.index', compact('transaksi'));
    }

    public function create()
    {
        // hanya pegawai yang belum memiliki tablet
        $pegawai = Pegawai::whereDoesntHave('transaksi', function ($q) {
            $q->where('status', 'Dipinjam');
        })->get();

        // hanya aset yang tersedia
        $aset = Aset::where('status','Tersedia')->get();

        return view('transaksi_aset.create', compact('pegawai','aset'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required',
            'aset_id' => 'required',
            'kondisi_awal' => 'required'
        ]);

        TransaksiAset::create([
            'pegawai_id' => $request->pegawai_id,
            'aset_id' => $request->aset_id,
            'tanggal_pinjam' => now(),
            'kondisi_awal' => $request->kondisi_awal,
            'status' => 'Dipinjam'
        ]);

        // ubah status aset menjadi Dipakai
        Aset::where('id', $request->aset_id)
            ->update(['status' => 'Dipakai']);

        return redirect()->route('transaksi-aset.index')
            ->with('success','Aset berhasil dipinjam');
    }

    public function show($id)
    {
        $transaksi = TransaksiAset::with(['pegawai','aset'])
                    ->findOrFail($id);

        return view('transaksi_aset.show', compact('transaksi'));
    }

    public function edit($id)
    {
        $transaksi = TransaksiAset::findOrFail($id);

        return view('transaksi_aset.edit', compact('transaksi'));
    }

    public function update(Request $request, $id)
    {
        $transaksi = TransaksiAset::findOrFail($id);

        $request->validate([
            'kondisi_kembali' => 'required'
        ]);

        $transaksi->update([
            'tanggal_kembali' => now(),
            'kondisi_kembali' => $request->kondisi_kembali,
            'status' => 'Dikembalikan'
        ]);

        // ubah status aset kembali tersedia
        $transaksi->aset->update([
            'status' => 'Tersedia'
        ]);

        return redirect()->route('transaksi-aset.index')
            ->with('success','Aset berhasil dikembalikan');
    }

    public function destroy($id)
    {
        $transaksi = TransaksiAset::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi-aset.index')
            ->with('success','Data transaksi dihapus');
    }

    public function kembali($id)
{
    $transaksi = TransaksiAset::findOrFail($id);

    $transaksi->update([
        'tanggal_kembali' => now(),
        'status' => 'Dikembalikan'
    ]);

    // ubah status aset kembali tersedia
    $transaksi->aset->update([
        'status' => 'Tersedia'
    ]);

    return redirect()->route('transaksi-aset.index')
        ->with('success','Tablet berhasil dikembalikan');
}
}
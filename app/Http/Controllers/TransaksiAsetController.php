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
            'tanggal_pinjam' => 'required|date',
            'bukti_peminjaman' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048'
        ], [
            'pegawai_id.required' => 'Pegawai wajib dipilih!',
            'aset_id.required' => 'Tablet wajib dipilih!',
            'tanggal_pinjam.required' => 'Tanggal peminjaman wajib diisi!',
            'tanggal_pinjam.date' => 'Format tanggal tidak valid!',
            'bukti_peminjaman.required' => 'Bukti peminjaman wajib diupload!',
            'bukti_peminjaman.mimes' => 'Format harus JPG, PNG, atau PDF!',
            'bukti_peminjaman.max' => 'Ukuran maksimal 2MB!',
        ]);

        $aset = Aset::findOrFail($request->aset_id);

        // =========================
        // UPLOAD FILE
        // =========================
        $path = null;

        if ($request->hasFile('bukti_peminjaman')) {
            $path = $request->file('bukti_peminjaman')
                            ->store('bukti_peminjaman', 'public');
        }

        // =========================
        // SIMPAN TRANSAKSI
        // =========================
        TransaksiAset::create([
            'pegawai_id' => $request->pegawai_id,
            'aset_id' => $request->aset_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'kondisi_awal' => $aset->kondisi,
            'bukti_peminjaman' => $path,
            'status' => 'Dipinjam'
        ]);

        // =========================
        // UPDATE STATUS ASET
        // =========================
        Aset::where('id', $request->aset_id)
            ->update(['status' => 'Dipakai']);

        return redirect()->route('transaksi-aset.index')
            ->with('success','Aset berhasil dipinjam');
    }

public function show($id)
{
    $transaksi = TransaksiAset::with(['pegawai','aset'])->findOrFail($id);

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

    // auto status berdasarkan kondisi
    $statusAset = 'Tersedia';

    if ($request->kondisi_kembali == 'Rusak Berat') {
        $statusAset = 'Perbaikan';
    } elseif ($request->kondisi_kembali == 'Hilang') {
        $statusAset = 'Nonaktif';
    }

    // update aset
    $transaksi->aset->update([
        'status' => $statusAset,
        'kondisi' => $request->kondisi_kembali
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


    // FUNCTION FINAL UNTUK MODAL UPLOAD
    public function kembalikan(Request $request, $id)
    {
        $request->validate([
            'tanggal_kembali' => 'required|date',
            'kondisi_kembali' => 'required',
            'bukti_pengembalian' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048'
        ], [
            'tanggal_kembali.required' => 'Tanggal kembali wajib diisi!',
            'tanggal_kembali.date' => 'Format tanggal tidak valid!',

            'kondisi_kembali.required' => 'Kondisi wajib dipilih!',

            'bukti_pengembalian.required' => 'Bukti pengembalian wajib diupload!',
            'bukti_pengembalian.mimes' => 'Format harus JPG, PNG, atau PDF!',
            'bukti_pengembalian.max' => 'Ukuran maksimal 2MB!',
        ]);

        $transaksi = TransaksiAset::findOrFail($id);

        // =========================
        // UPLOAD FILE
        // =========================
        if ($request->hasFile('bukti_pengembalian')) {
            $path = $request->file('bukti_pengembalian')
                            ->store('bukti_pengembalian', 'public');

            $transaksi->bukti_pengembalian = $path;
        }

        // =========================
        // UPDATE TRANSAKSI
        // =========================
        $transaksi->update([
            'tanggal_kembali' => $request->tanggal_kembali,
            'kondisi_kembali' => $request->kondisi_kembali,
            'status' => 'Dikembalikan'
        ]);

        // =========================
        // LOGIKA STATUS ASET
        // =========================
        $statusAset = 'Tersedia';

        if ($request->kondisi_kembali == 'Rusak Berat') {
            $statusAset = 'Perbaikan';
        } elseif ($request->kondisi_kembali == 'Hilang') {
            $statusAset = 'Nonaktif';
        }

        // =========================
        // UPDATE ASET
        // =========================
        $transaksi->aset->update([
            'status' => $statusAset,
            'kondisi' => $request->kondisi_kembali
        ]);

        return redirect()->route('transaksi-aset.index')
            ->with('success','Aset berhasil dikembalikan');
    }
    }
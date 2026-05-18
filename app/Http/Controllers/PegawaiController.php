<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\TransaksiAset;
use App\Models\Aset;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Tampilkan daftar pegawai
     */

public function index(Request $request)
{
    $query = Pegawai::query();

    // 🔍 SEARCH
    if ($request->search) {
        $query->where(function ($q) use ($request) {
            $q->where('nama', 'like', '%' . $request->search . '%')
              ->orWhere('nip', 'like', '%' . $request->search . '%')
              ->orWhere('unit_kerja', 'like', '%' . $request->search . '%');
        });
    }

    // 🔥 FILTER STATUS PENSIUN
    if ($request->status_pensiun == 'sudah') {

        $query->whereDate('tmt_pensiun', '<', now());

    } elseif ($request->status_pensiun == 'akan') {

        $query->whereBetween('tmt_pensiun', [
            now(),
            now()->addYear()
        ]);

    } elseif ($request->status_pensiun == 'belum') {

        $query->whereDate('tmt_pensiun', '>', now()->addYear());
    }

    // 🔥 FILTER STATUS PEMINJAMAN
    if ($request->status_peminjaman == 'meminjam') {

        $query->whereHas('transaksiAset', function ($q) {
            $q->whereNull('tanggal_kembali');
        });

    }

    if ($request->status_peminjaman == 'tidak') {

        $query->whereDoesntHave('transaksiAset', function ($q) {
            $q->whereNull('tanggal_kembali');
        });

    }

    $pegawai = $query->orderBy('nama', 'asc')
                      ->paginate(10);

    return view('pegawai.index', compact('pegawai'));
}

    /**
     * Detail pegawai
     */
    public function show($id)
    {
        $pegawai = Pegawai::findOrFail($id);

        // tablet yang masih dipinjam
        $transaksi = TransaksiAset::with('aset')
            ->where('pegawai_id', $id)
            ->whereNull('tanggal_kembali')
            ->get();

        // riwayat peminjaman
        $riwayat = TransaksiAset::with('aset')
            ->where('pegawai_id', $id)
            ->whereNotNull('tanggal_kembali')
            ->latest()
            ->get();

        return view('pegawai.show', compact('pegawai', 'transaksi', 'riwayat'));
    }

    /**
     * Form tambah pegawai
     */
    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * Simpan pegawai
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:pegawai,nip',
            'nama' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'unit_kerja' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'tmt_pensiun' => 'nullable|date',
        ]);

        Pegawai::create($request->all());

        return redirect()->route('pegawai.index')
            ->with('success', 'Data pegawai berhasil ditambahkan.');
    }

    /**
     * Form edit
     */
    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.edit', compact('pegawai'));
    }

    /**
     * Update
     */
    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $request->validate([
            'nip' => 'required|unique:pegawai,nip,' . $pegawai->id,
            'nama' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'unit_kerja' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'tmt_pensiun' => 'nullable|date',
        ]);

        $pegawai->update($request->all());

        return redirect()->route('pegawai.index')
            ->with('success', 'Data pegawai berhasil diperbarui.');
    }

    /**
     * Hapus
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();

        return redirect()->route('pegawai.index')
            ->with('success', 'Data pegawai berhasil dihapus.');
    }

    /**
     * Kembalikan tablet
     */
    public function kembalikanTablet($id)
    {
        $transaksi = TransaksiAset::findOrFail($id);

        $transaksi->tanggal_kembali = now();
        $transaksi->save();

        $aset = Aset::find($transaksi->aset_id);
        $aset->status = 'Tersedia';
        $aset->save();

        return redirect()->back()->with('success', 'Tablet berhasil dikembalikan.');
    }
}
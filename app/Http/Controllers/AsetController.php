<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aset;

class AsetController extends Controller
{

    /**
     * Tampilkan daftar aset + search + filter
     */
    public function index(Request $request)
    {
        $query = Aset::query();

        // ================= SEARCH =================
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('kode_bmn', 'like', '%' . $request->search . '%')
                  ->orWhere('tipe', 'like', '%' . $request->search . '%')
                  ->orWhere('merk', 'like', '%' . $request->search . '%');
            });
        }

        // ================= FILTER =================

        if ($request->tipe) {
            $query->where('tipe', $request->tipe);
        }

        if ($request->kondisi) {
            $query->where('kondisi', $request->kondisi);
        }

        if ($request->tahun) {
            $query->where('tahun_pengadaan', $request->tahun);
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        // ================= DATA =================
        $aset = $query->orderBy('kode_bmn', 'asc')->paginate(10);

        $tipeList = Aset::select('tipe')->distinct()->pluck('tipe');
        $tahunList = Aset::select('tahun_pengadaan')->distinct()->pluck('tahun_pengadaan');

        return view('aset.index', compact('aset', 'tipeList', 'tahunList'));
    }


    /**
     * Form tambah aset
     */
    public function create()
    {
        return view('aset.create');
    }


    /**
     * Simpan aset baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_bmn' => 'required|unique:aset,kode_bmn',
            'tipe' => 'required|string|max:255',
            'merk' => 'nullable|string|max:255',
            'serial_number' => 'nullable|string|max:255|unique:aset,serial_number',
            'imei' => 'nullable|string|max:255|unique:aset,imei',
            'tahun_pengadaan' => 'nullable|numeric',
            'kondisi' => 'required'
        ],[
            'kode_bmn.unique' => '⚠️ Kode aset sudah terdaftar.',
            'serial_number.unique' => '⚠️ Serial Number sudah terdaftar.',
            'imei.unique' => '⚠️ IMEI sudah terdaftar.'
        ]);

        Aset::create([
            'kode_bmn' => $request->kode_bmn,
            'tipe' => $request->tipe,
            'merk' => $request->merk,
            'serial_number' => $request->serial_number,
            'imei' => $request->imei,
            'tahun_pengadaan' => $request->tahun_pengadaan,
            'kondisi' => $request->kondisi,
            'status' => 'Tersedia'
        ]);

        return redirect()->route('aset.index')
            ->with('success','Data aset berhasil ditambahkan');
    }


    /**
     * Form edit aset
     */
    public function edit($id)
    {
        $aset = Aset::findOrFail($id);
        return view('aset.edit', compact('aset'));
    }


    /**
     * Update aset
     */
    public function update(Request $request, $id)
    {
        $aset = Aset::findOrFail($id);

        $request->validate([
            'kode_bmn' => 'required|unique:aset,kode_bmn,' . $aset->id,
            'tipe' => 'required|string|max:255',
            'merk' => 'nullable|string|max:255',
            'serial_number' => 'nullable|string|max:255|unique:aset,serial_number,' . $aset->id,
            'imei' => 'nullable|string|max:255|unique:aset,imei,' . $aset->id,
            'tahun_pengadaan' => 'nullable|numeric',
            'kondisi' => 'required',
            'status' => 'required'
        ],[
            'kode_bmn.unique' => '⚠️ Kode aset sudah terdaftar.',
            'serial_number.unique' => '⚠️ Serial Number sudah terdaftar.',
            'imei.unique' => '⚠️ IMEI sudah terdaftar.'
        ]);

        $aset->update([
            'kode_bmn' => $request->kode_bmn,
            'tipe' => $request->tipe,
            'merk' => $request->merk,
            'serial_number' => $request->serial_number,
            'imei' => $request->imei,
            'tahun_pengadaan' => $request->tahun_pengadaan,
            'kondisi' => $request->kondisi,
            'status' => $request->status
        ]);

        return redirect()->route('aset.index')
            ->with('success','Data aset berhasil diperbarui');
    }


    /**
     * Hapus aset (Soft Delete)
     */
    public function destroy($id)
    {
        $aset = Aset::findOrFail($id);
        $aset->delete();

        return redirect()->route('aset.index')
            ->with('success','Data aset berhasil dihapus (masuk ke trash)');
    }


    /**
     * Tampilkan data yang dihapus (Trash)
     */
    public function trash()
    {
        $data = Aset::onlyTrashed()->get();

        return view('aset.trash', compact('data'));
    }


    /**
     * Restore data
     */
    public function restore($id)
    {
        $aset = Aset::withTrashed()->findOrFail($id);
        $aset->restore();

        return redirect()->route('aset.trash')
            ->with('success','Data berhasil dikembalikan');
    }


    /**
     * Hapus permanen
     */
    public function forceDelete($id)
    {
        $aset = Aset::withTrashed()->findOrFail($id);
        $aset->forceDelete();

        return redirect()->route('aset.trash')
            ->with('success','Data dihapus permanen');
    }

}
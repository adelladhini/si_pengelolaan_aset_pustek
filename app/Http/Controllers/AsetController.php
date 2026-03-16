<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aset;

class AsetController extends Controller
{

    /**
     * Tampilkan daftar aset
     */
    public function index(Request $request)
    {
        $query = Aset::query();

        // SEARCH
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('kode_aset', 'like', '%' . $request->search . '%')
                  ->orWhere('nama_aset', 'like', '%' . $request->search . '%');
            });
        }

        // FILTER STATUS
        if ($request->status) {
            $query->where('status', $request->status);
        }

        $aset = $query->orderBy('kode_aset','asc')->paginate(10);

        return view('aset.index', compact('aset'));
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
            'kode_aset' => 'required|unique:aset,kode_aset',
            'nama_aset' => 'required|string|max:255',
            'merk' => 'nullable|string|max:255',
            'serial_number' => 'nullable|string|max:255|unique:aset,serial_number',
            'imei' => 'nullable|string|max:255|unique:aset,imei',
            'tahun_pengadaan' => 'nullable|numeric',
            'kondisi' => 'required'
        ],[
            'kode_aset.unique' => '⚠️ Kode aset sudah digunakan.',
            'serial_number.unique' => '⚠️ Serial Number sudah terdaftar.',
            'imei.unique' => '⚠️ IMEI sudah terdaftar pada aset lain.'
        ]);

        Aset::create([
            'kode_aset' => $request->kode_aset,
            'nama_aset' => $request->nama_aset,
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
            'kode_aset' => 'required|unique:aset,kode_aset,' . $aset->id,
            'nama_aset' => 'required|string|max:255',
            'merk' => 'nullable|string|max:255',
            'serial_number' => 'nullable|string|max:255|unique:aset,serial_number,' . $aset->id,
            'imei' => 'nullable|string|max:255|unique:aset,imei,' . $aset->id,
            'tahun_pengadaan' => 'nullable|numeric',
            'kondisi' => 'required',
            'status' => 'required'
        ],[
            'kode_aset.unique' => '⚠️ Kode aset sudah digunakan.',
            'serial_number.unique' => '⚠️ Serial Number sudah terdaftar.',
            'imei.unique' => '⚠️ IMEI sudah terdaftar pada aset lain.'
        ]);

        $aset->update([
            'kode_aset' => $request->kode_aset,
            'nama_aset' => $request->nama_aset,
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
     * Hapus aset
     */
    public function destroy($id)
    {
        $aset = Aset::findOrFail($id);

        $aset->delete();

        return redirect()->route('aset.index')
            ->with('success','Data aset berhasil dihapus');
    }
}
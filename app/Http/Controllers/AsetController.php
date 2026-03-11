<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aset;
use App\Models\Pegawai;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aset = Aset::with('pegawai')->latest()->get();

        return view('admin.aset.index', compact('aset'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pegawai = Pegawai::all();

        return view('admin.aset.create', compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([
        'kode_bmn' => 'required',
        'nama_aset' => 'required',
        'serial_number' => 'nullable|unique:aset,serial_number',
        'imei' => 'nullable|unique:aset,imei'
    ],[
        'serial_number.unique' => 'Serial Number sudah terdaftar.',
        'imei.unique' => 'IMEI sudah terdaftar.'
    ]);

    Aset::create([
        'kode_bmn' => $request->kode_bmn,
        'nama_aset' => $request->nama_aset,
        'serial_number' => $request->serial_number,
        'imei' => $request->imei,
        'tahun_pengadaan' => $request->tahun_pengadaan,
        'kondisi' => $request->kondisi,
        'status' => $request->status,
        'pegawai_id' => $request->pegawai_id,
        'keterangan' => $request->keterangan,
    ]);

    return redirect()->route('aset.index')
        ->with('success','Data aset berhasil ditambahkan');
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $aset = Aset::findOrFail($id);
        $pegawai = Pegawai::all();

        return view('admin.aset.edit', compact('aset','pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_bmn' => 'required',
            'nama_aset' => 'required',
        ]);

        $aset = Aset::findOrFail($id);

        $aset->update([
            'kode_bmn' => $request->kode_bmn,
            'nama_aset' => $request->nama_aset,
            'serial_number' => $request->serial_number,
            'imei' => $request->imei,
            'tahun_pengadaan' => $request->tahun_pengadaan,
            'kondisi' => $request->kondisi,
            'status' => $request->status,
            'pegawai_id' => $request->pegawai_id,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('aset.index')
            ->with('success','Data aset berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aset = Aset::findOrFail($id);

        $aset->delete();

        return redirect()->route('aset.index')
            ->with('success','Data aset berhasil dihapus');
    }
}
<?php

namespace App\Http\Controllers\Referensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Referensi\PenggunaReferensi;
use Exception;
use Illuminate\Support\Facades\DB;


class PenggunaReferensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PenggunaReferensi::where('status', '1')->paginate(10);
        return view('PenggunaReferensi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('PenggunaReferensi.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'pegawai' => ['required', 'integer'],
            'id_jabatan' => ['required', 'integer'],
            'id_satker' => ['required', 'integer'],
            'handphone' => ['required', 'string'],
        ]);

        DB::beginTransaction();
        $return_status = 'Valid';

        try {
            $data = PenggunaReferensi::create([
                'pegawai' => $validation['pegawai'],
                'id_jabatan' => $validation['id_jabatan'],
                'id_satker' => $validation['id_satker'],
                'handphone' => $validation['handphone'],
                'status' => '1',
                'user_input' => auth()->user()->id,
                'tanggal_input' => date('Y-m-d H:i:s'),
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e);
        }

        return redirect()->route('Daftar Pengguna Referensi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = PenggunaReferensi::findOrFail($id);
        return view('PenggunaReferensi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'pegawai' => ['required', 'integer'],
            'id_jabatan' => ['required', 'integer'],
            'id_satker' => ['required', 'integer'],
            'handphone' => ['required', 'string'],
        ]);
        DB::beginTransaction();
        $return_status = 'Valid';

        try {
            $data = PenggunaReferensi::findOrFail($id);
            $data->update([
                'pegawai' => $validation['pegawai'],
                'id_jabatan' => $validation['id_jabatan'],
                'id_satker' => $validation['id_satker'],
                'handphone' => $validation['handphone'],
                'status' => '1',
                'user_input' => auth()->user()->id,
                'tanggal_input' => date('Y-m-d H:i:s'),
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e);
        }

        return redirect()->route('Daftar Pengguna Referensi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = PenggunaReferensi::findOrFail($id);
        $data->update([
            'status' => '0',
            'user_update' => auth()->user()->id,
            'tanggal_update' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->route('Daftar Pengguna Referensi')->with('success', 'Pengguna berhasil dihapus');
    }
}
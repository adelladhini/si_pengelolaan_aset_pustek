<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi\Usulan;
use App\Models\Transaksi\Satker;
use App\Models\Referensi\Jenis;
use Exception;
use Illuminate\Support\Facades\DB;


class UsulanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Usulan::where('status', '1')->paginate(10);
        return view('Usulan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $satkerOptions = Satker::where('status', '1')->paginate(100);
        $jenisOptions = Jenis::where('status', '1')->paginate(100);
        return view('Usulan.edit', compact('satkerOptions', 'jenisOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validation = $request->validate([
            // 'tanggal' => ['required', 'date'],
            'id_satker' => ['required', 'integer'],
            'judul' => ['required', 'string'],
            'id_jenis' => ['required', 'integer'],
            'status_pelaku' => ['required', 'integer'],
            'status_prioritas' => ['required', 'integer'],
        ]);

        DB::beginTransaction();
        $return_status = 'Valid';

        try {
            $data = Usulan::create([
                'tanggal' => $validation['tanggal'],
                'id_satker' => $validation['id_satker'],
                'id_jenis' => $validation['id_jenis'],
                'judul' => $validation['judul'],
                'status_pelaku' => $validation['status_pelaku'],
                'status_prioritas' => $validation['status_prioritas'],
                'status' => '1',
                'user_input' => auth()->user()->id,
                'tanggal_input' => date('Y-m-d H:i:s'),
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e);
        }

        return redirect()->route('Daftar Usulan');
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
        $data = Usulan::findOrFail($id);
        return view('Usulan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'tanggal' => ['required', 'date'],
            'id_satker' => ['required', 'integer'],
            'id_jenis' => ['required', 'integer'],
            'judul' => ['required', 'string'],
            'status_pelaku' => ['required', 'integer'],
            'status_prioritas' => ['required', 'integer'],
        ]);
        DB::beginTransaction();
        $return_status = 'Valid';

        try {
            $data = Usulan::findOrFail($id);
            $data->update([
                'tanggal' => $validation['tanggal'],
                'id_satker' => $validation['id_satker'],
                'id_jenis' => $validation['id_jenis'],
                'judul' => $validation['judul'],
                'status_pelaku' => $validation['status_pelaku'],
                'status_prioritas' => $validation['status_prioritas'],
                'status' => '1',
                'user_input' => auth()->user()->id,
                'tanggal_input' => date('Y-m-d H:i:s'),
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e);
        }

        return redirect()->route('Daftar Usulan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Usulan::findOrFail($id);
        $data->update([
            'status' => '0',
            'user_update' => auth()->user()->id,
            'tanggal_update' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->route('Daftar Usulan')->with('success', 'Usulan berhasil dihapus');
    }
}
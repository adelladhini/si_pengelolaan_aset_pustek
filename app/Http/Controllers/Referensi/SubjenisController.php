<?php

namespace App\Http\Controllers\Referensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Referensi\Subjenis;
use Exception;
use Illuminate\Support\Facades\DB;


class SubjenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Subjenis::where('status', '1')->paginate(10);
        return view('Subjenis.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Subjenis.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'subjenis' => ['required', 'string'],
            'id_jenis' => ['required', 'integer'],
        ]);

        DB::beginTransaction();
        $return_status = 'Valid';

        try {
            $data = Subjenis::create([
                'subjenis' => $validation['subjenis'],
                'id_jenis' => $validation['id_jenis'],
                'status' => '1',
                'user_input' => auth()->user()->id,
                'tanggal_input' => date('Y-m-d H:i:s'),
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e);
        }

        return redirect()->route('Daftar Subjenis');
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
        $data = Subjenis::findOrFail($id);
        return view('Subjenis.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'subjenis' => ['required', 'string'],
            'id_jenis' => ['required', 'integer'],
        ]);
        DB::beginTransaction();
        $return_status = 'Valid';

        try {
            $data = Subjenis::findOrFail($id);
            $data->update([
                'subjenis' => $validation['subjenis'],
                'id_jenis' => $validation['id_jenis'],
                'status' => '1',
                'user_update' => auth()->user()->id,
                'tanggal_update' => date('Y-m-d H:i:s'),
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e);
        }

        return redirect()->route('Daftar Subjenis');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Subjenis::findOrFail($id);
        $data->update([
            'status' => '0',
            'user_update' => auth()->user()->id,
            'tanggal_update' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->route('Daftar Subjenis')->with('success', 'Subjenis berhasil dihapus');
    }
}
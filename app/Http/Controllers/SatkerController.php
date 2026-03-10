<?php

namespace App\Http\Controllers;

use App\Models\Satker;
use Illuminate\Http\Request;

class SatkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $satker = Satker::orderBy('nama_satker', 'asc')->get();

        return view('admin.satker.index', compact('satker'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.satker.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_satker' => 'required|string|max:255',
        ]);

        Satker::create([
            'nama_satker' => $request->nama_satker,
        ]);

        return redirect()->route('satker.index')
            ->with('success', 'Satker berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $satker = Satker::findOrFail($id);

        return view('admin.satker.edit', compact('satker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $satker = Satker::findOrFail($id);

        $request->validate([
            'nama_satker' => 'required|string|max:255',
        ]);

        $satker->update([
            'nama_satker' => $request->nama_satker,
        ]);

        return redirect()->route('satker.index')
            ->with('success', 'Satker berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $satker = Satker::findOrFail($id);

        $satker->delete();

        return redirect()->route('satker.index')
            ->with('success', 'Satker berhasil dihapus.');
    }
}
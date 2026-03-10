<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Satker;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    /**
     * Tampilkan daftar pegawai
     */
    public function index(Request $request)
    {
        $query = Pegawai::with(['jabatan', 'satker']);

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('nip', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->satker_id) {
            $query->where('satker_id', $request->satker_id);
        }

        $pegawai = $query->orderBy('nama', 'asc')->paginate(10);
        $satker = Satker::all();

        return view('admin.pegawai.index', compact('pegawai', 'satker'));
    }

    /**
     * Form tambah pegawai
     */
    public function create()
    {
        $satker = Satker::all();
        $jabatan = Jabatan::all();

        return view('admin.pegawai.create', compact('satker', 'jabatan'));
    }

    /**
     * Simpan pegawai baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:pegawai,nip',
            'nama' => 'required|string|max:255',
            'jabatan_id' => 'required|exists:jabatan,id',
            'satker_id' => 'required|exists:satker,id',
            'tmt_pensiun' => 'nullable|date',
            'status_pegawai' => 'required|in:0,1',
        ]);

        Pegawai::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jabatan_id' => $request->jabatan_id,
            'satker_id' => $request->satker_id,
            'tmt_pensiun' => $request->tmt_pensiun,
            'status_pegawai' => $request->status_pegawai,
        ]);

        return redirect()->route('pegawai.index')
            ->with('success', 'Data pegawai berhasil ditambahkan.');
    }

    /**
     * Form edit pegawai
     */
    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $satker = Satker::all();
        $jabatan = Jabatan::all();

        return view('admin.pegawai.edit', compact('pegawai', 'satker', 'jabatan'));
    }

    /**
     * Update pegawai
     */
    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $request->validate([
            'nip' => 'required|unique:pegawai,nip,' . $pegawai->id,
            'nama' => 'required|string|max:255',
            'jabatan_id' => 'required|exists:jabatan,id',
            'satker_id' => 'required|exists:satker,id',
            'tmt_pensiun' => 'nullable|date',
            'status_pegawai' => 'required|in:0,1',
        ]);

        $pegawai->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jabatan_id' => $request->jabatan_id,
            'satker_id' => $request->satker_id,
            'tmt_pensiun' => $request->tmt_pensiun,
            'status_pegawai' => $request->status_pegawai,
        ]);

        return redirect()->route('pegawai.index')
            ->with('success', 'Data pegawai berhasil diperbarui.');
    }

    /**
     * Nonaktifkan pegawai (soft nonaktif)
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $pegawai->update([
            'status_pegawai' => 0
        ]);

        return redirect()->route('pegawai.index')
            ->with('success', 'Pegawai berhasil dinonaktifkan.');
    }

    /**
     * Reset password (kalau pakai sistem login terpisah nanti)
     */
    public function resetPassword($id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $newPassword = '12345678';

        $pegawai->update([
            'password' => Hash::make($newPassword)
        ]);

        return redirect()->route('pegawai.index')
            ->with('success', 'Password berhasil di-reset. Password baru: ' . $newPassword);
    }
}
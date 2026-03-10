<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Satker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        $query = Pegawai::with('satker');

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('nip', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->satker_id) {
            $query->where('satker_id', $request->satker_id);
        }

        $pegawai = $query->paginate(10);
        $satker  = Satker::all();

        return view('admin.pegawai.index', compact('pegawai', 'satker'));
        }

        public function create()
        {
            $satker = Satker::all();
            return view('admin.pegawai.create', compact('satker'));
        }

        public function store(Request $request)
        {
            $request->validate([
                'nip' => 'required|unique:pegawai,nip',
                'nama' => 'required|string|max:255',
                'jabatan' => 'required|string|max:255',
                'satker_id' => 'required|exists:satker,id',
                'tmt_pensiun' => 'nullable|date',
            ]);

            Pegawai::create([
                'nip' => $request->nip,
                'nama' => $request->nama,
                'jabatan' => ucwords(strtolower($request->jabatan)),
                'satker_id' => $request->satker_id,
                'tmt_pensiun' => $request->tmt_pensiun,
                'is_active' => 1, // default aktif
            ]);

            return redirect()->route('pegawai.index')
                ->with('success', 'Pegawai berhasil ditambahkan.');
        }

        public function edit($id)
        {
            $pegawai = Pegawai::findOrFail($id);
            $satker  = Satker::all();

            return view('admin.pegawai.edit', compact('pegawai', 'satker'));
        }

        public function update(Request $request, $id)
        {
            $pegawai = Pegawai::findOrFail($id);

            $request->validate([
                'nip' => 'required|unique:pegawai,nip,' . $pegawai->id,
                'nama' => 'required|string|max:255',
                'jabatan' => 'required|string|max:255',
                'satker_id' => 'required|exists:satker,id',
                'tmt_pensiun' => 'nullable|date',
            ]);

            $pegawai->update([
                'nip' => $request->nip,
                'nama' => $request->nama,
                'jabatan' => ucwords(strtolower($request->jabatan)),
                'satker_id' => $request->satker_id,
                'tmt_pensiun' => $request->tmt_pensiun,
            ]);

            return redirect()->route('pegawai.index')
                ->with('success', 'Pegawai berhasil diperbarui.');
            }

            // NONAKTIF MANUAL
            public function destroy($id)
            {
            $pegawai = Pegawai::findOrFail($id);

            // Hapus akun user jika ada
            if ($pegawai->user) {
                $pegawai->user->delete();
            }

            // Hapus data pegawai
            $pegawai->delete();

            return redirect()->route('pegawai.index')
                ->with('success', 'Pegawai berhasil dihapus.');
        }

            // RESET PASSWORD
            public function resetPassword($id)
            {
                $pegawai = Pegawai::findOrFail($id);

                if (!$pegawai->user) {
                    return redirect()->back()
                        ->with('error', 'Pegawai belum memiliki akun.');
                }

                $defaultPassword = '12345678';

                $pegawai->user->update([
                    'password' => Hash::make($defaultPassword),
                    'force_change_password' => true,
                ]);

                return redirect()->route('pegawai.index')
                    ->with('success', 'Password berhasil di-reset.');
            }
        }
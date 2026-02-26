<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Website;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class PenggunaController extends Controller
{
    public function index()
    {
        $penggunas = User::where('status', 1)->with('website')->get();
        return view('pengguna.index', compact('penggunas'));

    }


    public function create()
    {
        $id_website = auth()->user()->id_website;
        $website = Website::find($id_website);
        return view('pengguna.create', compact('website'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = 'foto' . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(('templates/setjen/foto'), $imageName);
            $data['foto'] = 'templates/setjen/foto/' . $imageName;
        }

        if ($request->hasFile('cv')) {
            $image = $request->file('cv');
            $imageName = 'cv' . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(('templates/setjen/cv'), $imageName);
            $data['cv'] = 'templates/setjen/cv/' . $imageName;
        }

        User::create($data);

        return redirect()->route('pengguna.index')
            ->with('success', 'Pengguna berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $pengguna = User::findOrFail($id);
        $website = $pengguna->website;

        return view('pengguna.edit', compact('pengguna', 'website'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = 'foto' . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(('templates/setjen/foto'), $imageName);
            $data['foto'] = 'templates/setjen/foto/' . $imageName;
        }

        if ($request->hasFile('cv')) {
            $image = $request->file('cv');
            $imageName = 'cv' . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(('templates/setjen/cv'), $imageName);
            $data['cv'] = 'templates/setjen/cv/' . $imageName;
        }

dd($data['foto']);
        $pengguna = User::findOrFail($id);
        $pengguna->update($data);

        return redirect()->route('pengguna.index')
            ->with('success', 'Pengguna berhasil diperbarui.');
    }


    public function deleteFile($id, $jenis)
    {
        $pengguna = User::findOrFail($id);

        if ($jenis === 'img' && $pengguna->foto) {
            File::delete(($pengguna->foto));
            $pengguna->update(['foto' => null]);
            return redirect()->route('pengguna.edit', $id)->with('success', 'Foto berhasil dihapus.');
        }

        if ($jenis === 'pdf' && $pengguna->cv) {
            File::delete(($pengguna->cv));
            $pengguna->update(['cv' => null]);
            return redirect()->route('pengguna.edit', $id)->with('success', 'Foto berhasil dihapus.');
        }

        return redirect()->route('pengguna.edit', $id)->with('error', 'Tidak ada tindakan penghapusan yang dilakukan.');

    }

    public function destroy($id)
    {
        $pengguna = User::findOrFail($id);
        $pengguna->status = 9;
        $pengguna->save();

        return redirect()->route('pengguna.index')
            ->with('success', 'Pengguna berhasil dihapus.');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;


class ProfilController extends Controller
{
    public function index()
    {
            return view('profil.index');
    }

    public function edit()
    {
        $id=auth()->user()->id;

        $profil = User::findOrFail($id);
        $website = $profil->website;
        return view('profil.edit', compact('profil', 'website'));
    }


    public function update(Request $request)
    {
        $id=auth()->user()->id;
        $data = $request->all();

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = 'user_'. time() . '.' . $image->getClientOriginalExtension();
            $image->move(('templates/img/user'), $imageName);
            $data['foto'] = 'templates/img/user/' . $imageName;
        }

        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            $fileName = 'cv' . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(('templates/pdf/user'), $fileName);
            $data['cv'] = 'templates/pdf/user/' . $fileName;
        }
        
        $profil = User::findOrFail($id);
        $profil->update($data);

        return redirect()->route('profil.edit', 0)->with('success', 'Profil berhasil diperbarui.');
    }


    public function deleteFile($id, $jenis)
    {
        $profil = User::findOrFail($id);

        if ($jenis === 'img' && $profil->foto) {
            File::delete(($profil->foto));
            $profil->update(['foto' => null]);
            return redirect()->route('profil.edit', 0)->with('success', 'Pas Foto berhasil dihapus.');
        }

        if ($jenis === 'pdf' && $profil->cv) {
            File::delete(($profil->cv));
            $profil->update(['cv' => null]);
            return redirect()->route('profil.edit', 0)->with('success', 'CV berhasil dihapus.');
        }

        return redirect()->route('profil.edit', 0)->with('error', 'Tidak ada tindakan penghapusan yang dilakukan.');

    }
}

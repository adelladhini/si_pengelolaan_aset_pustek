<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        // Validasi input
        $credentials = $request->validate([
            'pengguna' => 'required',
            'password' => 'required',
        ]);

        // Coba login
        if (Auth::attempt($credentials)) {

            // Regenerate session (WAJIB untuk keamanan)
            $request->session()->regenerate();

            // Ambil user yang login
            $akunLogin = Auth::user();

            // Simpan data tambahan ke session
            session([
                'nama' => $akunLogin->nama,
                'nip' => $akunLogin->nip ?? null,
                'golongan' => $akunLogin->golongan ?? null,
                'id_satker' => $akunLogin->id_satker ?? null,
                'informal_photo_name' => $akunLogin->informal_photo_name ?? null,
                'satker' => $akunLogin->nama_satker ?? null,
            ]);

            return redirect()->route('admin.index');
        }

        // Jika gagal login
        return back()->withErrors([
            'pengguna' => 'Username atau password salah'
        ])->onlyInput('pengguna');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
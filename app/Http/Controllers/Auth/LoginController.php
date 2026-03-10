<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    /**
     * Tampilkan halaman login
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Proses login (User & Pegawai)
     */
    public function login(Request $request): RedirectResponse
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        /**
         * 🔹 1. Coba login sebagai ADMIN (users)
         */
        if (Auth::guard('web')->attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->intended(route('admin.index'));
        }

        /**
         * 🔹 2. Kalau gagal, coba login sebagai PEGAWAI
         */
        if (Auth::guard('pegawai')->attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->intended(route('pegawai.index'));
        }

        /**
         * 🔹 Kalau dua-duanya gagal
         */
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    /**
     * Logout (Auto detect guard)
     */
    public function logout(Request $request): RedirectResponse
    {
        if (Auth::guard('pegawai')->check()) {
            Auth::guard('pegawai')->logout();
        } elseif (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
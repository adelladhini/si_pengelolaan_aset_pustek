<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\TransaksiAsetController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\PengaturanAkunController;


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [LoginController::class, 'login'])
    ->middleware('guest');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');


/*
|--------------------------------------------------------------------------
| AREA SETELAH LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // ✅ Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Pegawai
    Route::resource('pegawai', PegawaiController::class);

    Route::post('/pegawai/{id}/reset', [PegawaiController::class, 'resetPassword'])
        ->name('pegawai.reset');

    // Aset
    Route::resource('aset', AsetController::class);

    Route::resource('transaksi-aset', TransaksiAsetController::class);

    Route::get('/pengaturan-akun', [PengaturanAkunController::class, 'index'])
        ->name('pengaturan.akun');

    Route::post('/pengaturan-akun/update', [PengaturanAkunController::class, 'update'])
        ->name('pengaturan.akun.update');
});

Route::patch('/transaksi-aset/{id}/kembalikan', [TransaksiAsetController::class, 'kembalikan'])
    ->name('transaksi-aset.kembalikan');

// halaman trash
Route::get('/aset/trash', [AsetController::class, 'trash'])->name('aset.trash');

// restore data
Route::post('/aset/restore/{id}', [AsetController::class, 'restore'])->name('aset.restore');

// hapus permanen
Route::delete('/aset/force-delete/{id}', [AsetController::class, 'forceDelete'])->name('aset.forceDelete');
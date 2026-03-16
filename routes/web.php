<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\TransaksiAsetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PengaturanAkunController;

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
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

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | DATA MASTER
    |--------------------------------------------------------------------------
    */

    Route::resource('pegawai', PegawaiController::class);
    Route::resource('aset', AsetController::class);

    /*
    |--------------------------------------------------------------------------
    | TRANSAKSI ASET
    |--------------------------------------------------------------------------
    */

    Route::resource('transaksi-aset', TransaksiAsetController::class);

    // Pengembalian tablet
    Route::patch('/transaksi-aset/kembali/{id}', 
        [TransaksiAsetController::class, 'kembali']
    )->name('transaksi-aset.kembali');

    /*
    |--------------------------------------------------------------------------
    | MANAJEMEN USER
    |--------------------------------------------------------------------------
    */

    Route::resource('users', UserController::class);

    /*
    |--------------------------------------------------------------------------
    | PENGATURAN AKUN
    |--------------------------------------------------------------------------
    */

    Route::get('/pengaturan-akun', [PengaturanAkunController::class, 'index'])
        ->name('pengaturan.akun');

    Route::post('/pengaturan-akun/update', [PengaturanAkunController::class, 'update'])
        ->name('pengaturan.akun.update');

    Route::patch('/pegawai/kembalikan-tablet/{id}',
    [PegawaiController::class,'kembalikanTablet'])
    ->name('pegawai.kembalikanTablet');

});
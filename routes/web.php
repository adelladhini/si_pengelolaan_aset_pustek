<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\PengaturanAkunController;
use App\Http\Controllers\SatkerController; // TANPA Admin

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

    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])
        ->name('admin.index');

    // Pegawai
    Route::resource('pegawai', PegawaiController::class);

    Route::post('/pegawai/{id}/reset', [PegawaiController::class, 'resetPassword'])
    ->name('pegawai.reset');

    // Aset
    Route::resource('aset', AsetController::class);

    // Satker (TANPA prefix admin)
    Route::resource('satker', SatkerController::class);

    // Pengaturan akun
    Route::get('/pengaturan-akun', [PengaturanAkunController::class, 'index'])
        ->name('pengaturan.akun');

    Route::post('/pengaturan-akun/update', [PengaturanAkunController::class, 'update'])
        ->name('pengaturan.akun.update');

});
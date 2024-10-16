<?php

use App\Http\Controllers\Mobile\DashboardMController;
use App\Http\Controllers\ObatMController;
use App\Livewire\Pages\Auth\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\BerobatController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\Mobile\AuthLoginController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routesreturn view('auth.login');turn view('auth.login');re loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/login');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');

    Route::get('/dokter', [DokterController::class, 'index'])->name('dokter');
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
    Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran');
    Route::get('/pendaftaran/loket', [PendaftaranController::class, 'lihat_pendaftaran'])->name('pendaftaran.loket');
    Route::get('/obat', [ObatController::class, 'index'])->name('obat');
    Route::get('/poli', [PoliController::class, 'index'])->name('poli');
    Route::get('/berobat', [BerobatController::class, 'index'])->name('berobat');
    Route::get('/resep', [ResepController::class, 'index'])->name('resep');
});

// Login
Route::get('/apps/login', [AuthLoginController::class, 'login'])->name('mobile.login');

Route::middleware(['auth'])->group(function () {
    Route::get('/apps/dashboard', [DashboardMController::class, 'index'])->name('mobile.dashboard');
    Route::get('/apps/obat-masuk', [ObatMController::class, 'obat_masuk'])->name('mobile.obat-masuk');
    Route::get('/apps/transaksi-obat-masuk', [ObatMController::class, 'transaksi'])->name('mobile.transaksi.obatmasuk');
    Route::get('/apps/cek-stok-obat', [ObatMController::class, 'cek_stok'])->name('mobile.cek_stok');
    Route::get('/apps/logout', [AuthLoginController::class, 'logout'])->name('mobile.logout');
});



// require __DIR__.'/auth.php';

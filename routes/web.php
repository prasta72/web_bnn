<?php

use App\Http\Controllers\Admin\AbsensiController;
use App\Http\Controllers\Admin\KegiatanKPController;
use App\Http\Controllers\Admin\KerjaPraktekController;
use App\Http\Controllers\Admin\NilaiController;
use App\Http\Controllers\Admin\PembinaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\AbsensiController as UserAbsensiController;
use App\Http\Controllers\User\KegiatanKPController as UserKegiatanKPController;
use App\Http\Controllers\User\KerjaPraktekController as UserKerjaPraktekController;
use App\Http\Controllers\User\NilaiController as UserNilaiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->group(function () {
    Route::middleware('auth:admins')->group(function () {
        // dashboard
        Route::get('/dashboard', [AdminController::class, 'index'])->name('adminDashboard');

        // pembina
        Route::get('/pembina', [PembinaController::class, 'index'])->name('adminPembina');
        Route::get('/pembina/create', [PembinaController::class, 'create'])->name('adminPembina.create');
        Route::post('/pembina/create', [PembinaController::class, 'store'])->name('adminPembina.store');
        Route::get('/pembina/update/{id}', [PembinaController::class, 'edit'])->name('adminPembina.edit');
        Route::patch('/pembina/update/{id}', [PembinaController::class, 'update'])->name('adminPembina.update');
        Route::delete('/pembina/delete/{id}', [PembinaController::class, 'destroy'])->name('adminPembina.destroy');
        Route::get('/pembina/cari', [PembinaController::class, 'cari'])->name('adminPembinaCari');

        // kerjapraktek
        Route::get('/kerja-praktek', [KerjaPraktekController::class, 'index'])->name('adminKerjaPraktek');
        Route::get('/kerja-praktek/detail/{id}', [KerjaPraktekController::class, 'show'])->name('adminKerjaPraktek.show');
        Route::get('/kerja-praktek/update/{id}', [KerjaPraktekController::class, 'edit'])->name('adminKerjaPraktek.edit');
        Route::patch('/kerja-praktek/update/{id}', [KerjaPraktekController::class, 'update'])->name('adminKerjaPraktek.update');
        Route::delete('/kerja-praktek/delete/{id}', [KerjaPraktekController::class, 'destroy'])->name('adminKerjaPraktek.destroy');

        Route::get('/kerja-praktek/cari', [KerjaPraktekController::class, 'cari'])->name('adminKerjaPraktekCari');

        // absensi
        Route::get('/absensi', [AbsensiController::class, 'index'])->name('adminAbsensi');
        Route::patch('/absensi/update/{id}', [AbsensiController::class, 'update'])->name('adminAbsensi.update');
        Route::patch('/absensi/update-all', [AbsensiController::class, 'updateall'])->name('adminAbsensi.updateall');
        Route::get('/absensi/search-date', [AbsensiController::class, 'searchDate'])->name('adminAbsensi.searchDate');

        // kegiatanKP
        Route::get('/kegiatan-kerja-praktek', [KegiatanKPController::class, 'index'])->name('adminKegiatanKP');
        Route::get('/kegiatan-kerja-praktek/create', [KegiatanKPController::class, 'create'])->name('adminKegiatanKP.create');
        Route::post('/kegiatan-kerja-praktek/create', [KegiatanKPController::class, 'store'])->name('adminKegiatanKP.store');
        Route::get('kegiatan-kerja-praktek/update/{id}', [KegiatanKPController::class, 'edit'])->name('adminKegiatanKP.edit');
        Route::patch('kegiatan-kerja-praktek/update/{id}', [KegiatanKPController::class, 'update'])->name('adminKegiatanKP.update');
        Route::delete('kegiatan-kerja-praktek/delete/{id}', [KegiatanKPController::class, 'destroy'])->name('adminKegiatanKP.destroy');
        Route::get('kegiatan-kerja-praktek/cari', [KegiatanKPController::class, 'cari'])->name('adminKegiatanKPCari');

        // nilai
        Route::get('/nilai', [NilaiController::class, 'index'])->name('adminNilai');
        Route::get('/nilai/create', [NilaiController::class, 'create'])->name('adminNilai.create');
        Route::post('/nilai/create', [NilaiController::class, 'store'])->name('adminNilai.store');
        Route::get('/nilai/update/{id}', [NilaiController::class, 'edit'])->name('adminNilai.edit');
        Route::patch('/nilai/update/{id}', [NilaiController::class, 'update'])->name('adminNilai.update');
        Route::delete('/nilai/delete/{id}', [NilaiController::class, 'destroy'])->name('adminNilai.destroy');
        Route::get('/nilai/cari', [NilaiController::class, 'cari'])->name('adminNilaiCari');


        // logout
        Route::post('/logout',[AdminAuthController::class, 'logout'])->name('logoutAdmin');
    });


    Route::middleware('guest')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'login'])->name('adminlogin');
    Route::post('/login', [AdminAuthController::class, 'loginHandler'])->name('adminloginHandler');
    });
});





Route::prefix('user')->group(function () {
    Route::middleware('auth:web')->group(function () {
        // dashboard
        Route::get('/dashboard', [UserController::class, 'index'])->name('userDashboard');
        Route::post('/daftar-kerja-praktek', [UserController::class, 'daftarKP'])->name('user.daftarKP');

        // kerja Praktek
        Route::get('/kerja-praktek', [UserKerjaPraktekController::class, 'index'])->name('userKerjaPraktek');
        Route::get('/kerja-praktek/edit/{id}', [UserKerjaPraktekController::class, 'edit'])->name('userKerjaPraktek.edit');
        Route::patch('/kerja-praktek/edit/{id}', [UserKerjaPraktekController::class, 'update'])->name('userKerjaPraktek.update');

        // absensi
        Route::get('/absensi', [UserAbsensiController::class, 'index'])->name('userAbsensi');
        Route::get('/absensi/create', [UserAbsensiController::class, 'create'])->name('userAbsensi.create');
        Route::post('/absensi/create', [UserAbsensiController::class, 'store'])->name('userAbsensi.store');
        Route::get('/absensi/search-date', [UserAbsensiController::class, 'searchDate'])->name('userAbsensi.searchDate');

        // kegiatanKp 
        Route::get('/kegiatan', [UserKegiatanKPController::class, 'index'])->name('userKegiatanKP');
        Route::patch('/kegiatan/update/{id}', [UserKegiatanKPController::class, 'update'])->name('userKegiatanKP.update');
        Route::get('/kegiatan/search-date', [UserKegiatanKPController::class, 'searchDate'])->name('userKegiatanKP.searchDate');


        // nilai
        Route::get('/nilai', [UserNilaiController::class, 'index'])->name('userNilai');



        

        // logout
        Route::post('/logout',[UserAuthController::class, 'logout'])->name('logoutUser');
    });
    Route::middleware('guest')->group(function () {
        Route::get('/daftar-user', [UserController::class, 'daftarUser'])->name('daftarUser');
        Route::post('/daftar-user', [UserController::class, 'daftarUserHandler'])->name('daftarUserHandler');
        Route::get('/login', [UserAuthController::class, 'login'])->name('login');
        Route::post('/login', [UserAuthController::class, 'loginHandler'])->name('loginHandler');
    });
});


Route::get('/', [HomeController::class, 'index'])->name('home');





Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

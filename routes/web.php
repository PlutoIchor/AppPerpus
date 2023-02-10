<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdentitasController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\UserController;
use App\Models\Penerbit;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::get('/inbox', [PesanController::class, 'yourInbox'])->name('inbox');
Route::get('/pesanTerkirim', [PesanController::class, 'yourMessages'])->name('pesan.terkirim');
Route::get('/pesan/{id_pesan}', [PesanController::class, 'readMessage']);
Route::post('/create_pesan', [PesanController::class, 'createPesan'])->name('create.pesan');

Route::prefix('user')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'user'])->name('user.dashboard');

    Route::get('/form_peminjaman', [PeminjamanController::class, 'formPeminjaman'])->name('user.form.peminjaman');
    Route::get('/form_peminjaman/{id_buku}', [PeminjamanController::class, 'formPeminjaman']);
    Route::get('/riwayat_peminjaman', [PeminjamanController::class, 'viewPeminjaman'])->name('user.riwayat.peminjaman');
    Route::post('/create_peminjaman', [PeminjamanController::class, 'createPeminjaman'])->name('user.create.peminjaman');

    Route::post('/create_pengembalian/{id_peminjaman}', [PeminjamanController::class, 'createPengembalian']);
    Route::get('/riwayat_pengembalian', [PeminjamanController::class, 'viewPengembalian'])->name('user.riwayat.pengembalian');

    Route::get('/profil', function () {
        return view('user.profil');
    })->name('user.profil');
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');

    Route::get('/anggota', [UserController::class, 'anggota'])->name('admin.anggota');
    Route::post('/create_anggota', [UserController::class, 'createAnggota'])->name('admin.create.anggota');
    Route::post('/update_anggota/{id_anggota}', [UserController::class, 'updateAnggota']);
    Route::post('/update_profil', [UserController::class, 'updateProfil'])->name('user.update.profil');
    Route::delete('/delete_anggota/{id_anggota}', [UserController::class, 'deleteAnggota']);

    Route::get('/admin', [UserController::class, 'admin'])->name('admin.admin');
    Route::post('/create_admin', [UserController::class, 'createAdmin'])->name('admin.create.admin');
    Route::post('/update_admin/{id_admin}', [UserController::class, 'updateAdmin']);
    Route::delete('/delete_admin/{id_admin}', [UserController::class, 'deleteAdmin']);

    Route::get('/penerbit', [PenerbitController::class, 'viewPenerbit'])->name('admin.penerbit');
    Route::post('/create_penerbit', [PenerbitController::class, 'createPenerbit'])->name('admin.create.penerbit');
    Route::post('/update_penerbit/{id_penerbit}', [PenerbitController::class, 'updatePenerbit']);
    Route::delete('/delete_penerbit/{id_penerbit}', [PenerbitController::class, 'deletePenerbit']);

    Route::get('/peminjaman', [PeminjamanController::class, 'laporanPeminjaman'])->name('admin.peminjaman');

    Route::get('/buku', [BukuController::class, 'viewBuku'])->name('admin.buku');
    Route::post('/create_buku', [BukuController::class, 'createBuku'])->name('admin.create.buku');
    Route::post('/update_buku/{id_buku}', [BukuController::class, 'updateBuku']);
    Route::delete('/delete_buku/{id_buku}', [BukuController::class, 'deleteBuku']);

    Route::get('/kategori', [KategoriController::class, 'viewKategori'])->name('admin.kategori'); 
    Route::post('/create_kategori', [KategoriController::class, 'createKategori'])->name('admin.create.kategori'); 
    Route::post('/update_kategori/{id_kategori}', [KategoriController::class, 'updateKategori']); 
    Route::delete('/delete_kategori/{id_kategori}', [KategoriController::class, 'deleteKategori']); 

    Route::get('/identitas', [IdentitasController::class, 'viewIdentitas'])->name('admin.identitas'); 
    Route::post('/update_identitas', [IdentitasController::class, 'updateIdentitas'])->name('admin.update.identitas'); 
});

Auth::routes();

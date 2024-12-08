<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\umkmController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SuperAdminController;
use App\Models\Produk;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
Route::get('/superadmin/dashboard', function () {
    return view('superadmin.dashboard');
});
Route::get('/superadmin/lihatsuperadmin', function () {
    return view('superadmin.lihatsuperadmin');
});
Route::get('/produk/lihatproduk', function () {
    return view('produk.lihatproduk'); 
});
Route::get('/produk/lihatproduk', [ProdukController::class, 'index'])->name('produk.lihatproduk');

Route::post('/produk/lihatproduk', [ProdukController::class, 'store'])->name('produk.store');

Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');

Route::put('/produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');

Route::get('/produk/delete/{id}', [ProdukController::class, 'delete'])->name('produk.delete');

Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');


Route::get('/superadmin/lihatsuperadmin', function () {
    return view('superadmin.lihatsuperadmin'); 
});

Route::get('/umkm/lihatumkm', function () {
    return view('umkm.lihatumkm'); 
});
Route::get('/umkm/lihatumkm', [UmkmController::class, 'index'])->name('umkm.lihatumkm');

Route::post('/umkm/lihatumkm', [UmkmController::class, 'store'])->name('umkm.store');

Route::get('/umkm/edit/{id}', [UmkmController::class, 'edit'])->name('umkm.edit');

Route::put('/umkm/update/{id}', [UmkmController::class, 'update'])->name('umkm.update');

Route::get('/umkm/delete/{id}', [UmkmController::class, 'delete'])->name('umkm.destroy');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [SesiController::class, 'dashboard'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);
});

Route::get('/kategori/lihatkategori', function () {
    return view('kategori.lihatkategori'); 
});
Route::get('/kategori/lihatkategori', [KategoriController::class, 'index'])->name('kategori.lihatkategori');

Route::post('/kategori/lihatkategori', [KategoriController::class, 'store'])->name('kategori.store');

Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');

Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');

Route::delete('/kategori/delete/{id}', [KategoriController::class, 'delete'])->name('kategori.destroy');

Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return redirect('/superadmin/dashboard');
    });

    Route::get('/superadmin', [AdminController::class, 'dashboard']); 

    Route::get('/superadmin/logout', [SesiController::class, 'logout']);
});
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});


Route::get('/superadmin/lihatsuperadmin', function () {
    return view('superadmin.lihatsuperadmin'); 
});

Route::get('/superadmin/lihatsuperadmin', [SuperadminController::class, 'index'])->name('superadmin.lihatsuperadmin');

  // Simpan admin baru
Route::post('/superadmin/lihatsuperadmin', [SuperadminController::class, 'store'])->name('superadmin.store');

  // Form edit admin
Route::get('superadmin/edit/{id}', [SuperadminController::class, 'edit'])->name('superadmin.edit');

  // Update admin
Route::put('superadmin/update/{id}', [SuperadminController::class, 'update'])->name('superadmin.update');

  // Hapus admin
Route::get('superadmin/delete/{id}', [SuperadminController::class, 'destroy'])->name('superadmin.delete');





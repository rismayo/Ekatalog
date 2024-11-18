<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\umkmController;
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

Route::get('/umkm/delete/{id}', [UmkmController::class, 'delete'])->name('umkm.delete');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [SesiController::class, 'dashboard'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);
});

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

// Route untuk SuperAdmin
Route::prefix('superadmin')->group(function () {
    // Tampilkan daftar admin
    Route::get('/', [SuperadminController::class, 'index'])->name('superadmin.lihatadmin');

    // Form tambah admin baru
    Route::get('/create', function () {
        return view('adminumkm/lihat.adminumkm'); // Pastikan view `create.blade.php` ada di folder `resources/views/superadmin`
    })->name('adminumkm/lihatumkm');

    // Simpan admin baru
    Route::post('/store', [SuperadminController::class, 'store'])->name('superadmin.store');

    // Form edit admin
    Route::get('/edit/{id}', [SuperadminController::class, 'edit'])->name('superadmin.edit');

    // Update admin
    Route::post('/update/{id}', [SuperadminController::class, 'update'])->name('superadmin.update');

    // Hapus admin
    Route::get('/delete/{id}', [SuperadminController::class, 'destroy'])->name('superadmin.delete');
});
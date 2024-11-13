<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\umkmController;
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

Route::delete('/umkm/delete/{id}', [UmkmController::class, 'destroy'])->name('umkm.destroy');

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
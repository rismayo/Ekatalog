<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiController;
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
Route::get('/superadmin/crudsuperadmin', function () {
    return view('superadmin.crudsuperadmin');
});
Route::get('/superadmin/lihatsuperadmin', function () {
    return view('superadmin.lihatsuperadmin');
});
Route::get('/umkm/crudumkm', function () {
    return view('umkm.crudumkm');
});

Route::get('/produk/crudproduk', function () {
    return view('produk.crudproduk');
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

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [SesiController::class, 'dashboard'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);
});
// Rute untuk pengguna yang sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return redirect('/superadmin/dashboard');
    });

    Route::get('/superadmin', [AdminController::class, 'dashboard']); // Halaman dashboard

    Route::get('/superadmin/logout', [SesiController::class, 'logout']); // Proses logout
});
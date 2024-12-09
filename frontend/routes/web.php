<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
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
Route::get('/testimonial', function () {
    return view('testimonial');
});
Route::get('/404', function () {
    return view('404');
});
Route::get('/cart', function () {
    return view('cart');
});
Route::get('/chackout', function () {
    return view('chackout');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/hubungi-kami', function () {
    return view('hubungi-kami');
});
Route::get('/', [ProdukController::class, 'welcome'])->name('welcome');
Route::get('/', [KategoriController::class, 'welcome'])->name('welcome');
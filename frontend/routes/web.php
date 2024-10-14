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
Route::get('/shop', function () {
    return view('shop');
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
Route::get('/shop-detail', function () {
    return view('shop-detail');
});
Route::get('/contact', function () {
    return view('contact');
});
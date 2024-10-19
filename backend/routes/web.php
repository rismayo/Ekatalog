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
Route::get('/superadmin/crudsuperadmin', function () {
    return view('superadmin.crudsuperadmin');
});
Route::get('/superadmin/lihatsuperadmin', function () {
    return view('superadmin.lihatsuperadmin');
});
Route::get('/superadmin/dashboard', function () {
    return view('superadmin.dashboard');
});
Route::get('/login', [SesiController::class, 'dashboard']);
Route::post('/login', [SesiController::class, 'login']);
Route::get('/superadmin', [AdminController::class, 'dashboard']);
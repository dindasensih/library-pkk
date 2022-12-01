<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::get('/template', function () {
    return view('template');
});

Route::resource('kategori', KategoriController::class);
Route::get('kategori/{kategori}/delete', [KategoriController::class, 'destroy']);

Route::resource('buku', BukuController::class);
Route::get('buku/{buku}/delete', [BukuController::class, 'destroy']);

Route::resource('users', UserController::class);
Route::get('users/{user}/delete', [UserController::class, 'destroy']);

Auth::routes();


Route::get('dashboard', [BukuController::class, 'dashboard']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

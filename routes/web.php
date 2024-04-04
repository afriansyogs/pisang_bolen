<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\User\ProdukController;
use App\Http\Controllers\User\FavouriteController;

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

Route::get('/saran', [SaranController::class, 'saran'])->name('saran.saran');

Route::controller(ProdukController::class)->group(function() {
    Route::get('/menu', 'index')->name('menu.index');
});

Route::controller(FavouriteController::class)->group(function() {
    Route::get('/fav', 'index')->name('fav.index');
});

Route::get('/signIn', function () {
    return view('Login&Register.signIn');
});

Route::get('/login', function () {
    return view('Login&Register.login');
});


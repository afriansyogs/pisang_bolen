<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\User\TestiController;

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
    return view('dasboard_user');
});

// Route::resource('/', \App\Http\Controllers\HomeController::class);

Route::resource('/saran', \App\Http\Controllers\SaranController::class);

Route::controller(ProdukController::class)->group(function() {
    Route::get('/Produk', 'index')->name('Produk.index');
});

Route::get('/signIn', function () {
    return view('Login&Register.signIn');
});

Route::get('/sesi', [SessionController::class, 'login']);
Route::post('/sesi/login', [SessionController::class, 'login']);

Route::controller(TestiController::class)->group(function() {
    Route::get('/testi', 'index')->name('testimoni.index');
});

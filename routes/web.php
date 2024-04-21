<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\ProdukController;
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
    Route::get('Produk/', 'index')->name('Produk.index');
});

Route::controller(ProdukController::class)->group(function () {
    Route::get('/Admin', 'admin')->name('Admin.admin');
    Route::get('/Admin/history', 'history')->name('Admin.history');
    Route::get('/Admin/create', 'create')->name('Admin.create');
    Route::post('/Admin/kirim', 'store')->name('Admin.store');
    Route::get('/Admin/edit/{slug_link}', 'edit')->name('Admin.edit');
    Route::put('/Admin/update/{slug_link}', 'update')->name('Admin.update');
    Route::get('/Admin/hapus/{slug_link}', 'hapus')->name('Admin.hapus');
    Route::put('/Admin/softdelete/{slug_link}', 'softdelete')->name('Admin.softdelete');
});

// Route::controller(ProdukController::class)->group(function() {
//     Route::get('Produk/', 'Fav')->name('Produk.Fav');
// });

Route::get('/signIn', function () {
    return view('Login&Register.signIn');
});

Route::get('/login', function () {
    return view('Login&Register.login');
});

Route::controller(TestiController::class)->group(function() {
    Route::get('/testi', 'index')->name('testimoni.index');
});

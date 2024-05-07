<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\DasboardController;
use App\Models\Saran;

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

// Route::get('/dasbhoard_admin', function () {
//     return view('admin/dasbhoard_admin');
// });

// Route::resource('/', \App\Http\Controllers\DasboardController::class);

Route::resource('/', \App\Http\Controllers\DasboardController::class)->names([
    'index' => 'dasboard.index',
]);

Route::resource('/dasbhoard_admin', \App\Http\Controllers\SaranController::class);
Route::delete('/dashboard_admin/softdelete/{id}', [SaranController::class, 'softDelete'])->name('dashboard_admin.softdelete');
Route::get('/dashboard_admin/onlytrash', [SaranController::class, 'onlyTrashSaran'])->name('dashboard_admin.onlytrash');







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

Route::get('/register', [SessionController::class, 'register'])->name('register');
Route::post('/register-proses', [SessionController::class, 'register_proses'])->name('register-proses');

Route::get('/login', [SessionController::class, 'index'])->name('login');
Route::post('/login-proses', [SessionController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [SessionController::class, 'logout'])->name('logout');



Route::resource('/adminTesti', \App\Http\Controllers\TestimoniController::class);

Route::controller(TestimoniController::class)->group(function() {
    Route::get('/adminTesti', 'admin')->name('adminTesti.admin');
    Route::get('/userTesti', 'index')->name('userTesti.index');
});


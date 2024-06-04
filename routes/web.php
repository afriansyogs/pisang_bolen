<?php

use App\Http\Controllers\AdminSessionController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Profile;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
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

Route::get('/about', function () {
    return view('user/about/index');
});

// Route::resource('/', \App\Http\Controllers\DasboardController::class);

Route::resource('/', \App\Http\Controllers\DashboardController::class)->names([
    'index' => 'dashboard.index',
]);

Route::resource('/dashboard_admin', \App\Http\Controllers\SaranController::class);
Route::controller(SaranController::class)->group(function() {
    Route::get('/dashboard_admin/onlytrash', 'onlyTrashSaran')->name('dashboard_admin.onlytrash');
    Route::delete('dashboard_admin/softdelete/{id}', 'softDelete')->name('dashboard_admin.softdelete');
    Route::put('/dashboard_admin/restore/{id}', 'restore')->name('dashboard_admin.restore');
});


Route::resource('/cart', \App\Http\Controllers\CartController::class);

Route::resource('/payment', \App\Http\Controllers\PaymentController::class);


Route::controller(ProdukController::class)->group(function() {
    Route::get('Produk/', 'index')->name('Produk.index');
    Route::get('Produk/{slug_link}', 'show')->name('Produk.show');
    Route::get('/search', 'search')->name('search');
    // Route::post('/Produk/Favorite/Add/{products}', 'addFavorite')->name('Produk.favorite');
    // Route::delete('/Produk/Favorite/Remove{products}', 'Favorite')->name('Produk.removefavorite');
});

Route::controller(ProdukController::class)->group(function () {
    Route::get('/Admin', 'admin')->name('Admin.admin');
    Route::get('/Admin/create', 'create')->name('Admin.create');
    Route::post('/Admin/kirim', 'store')->name('Admin.store');
    Route::get('/Admin/edit/{slug_link}', 'edit')->name('Admin.edit');
    Route::put('/Admin/update/{slug_link}', 'update')->name('Admin.update');
    Route::get('/Admin/hapus/{slug_link}', 'hapus')->name('Admin.hapus');
    Route::put('/Admin/softdelete/{slug_link}', 'softdelete')->name('Admin.softdelete');
    Route::get('/Admin/history', 'history')->name('Admin.history');
    Route::post('/Admin/restore/{slug_link}', 'restore')->name('Admin.restore');
    Route::delete('/Admin/permanent-delete/{id}', 'deletePermanent')->name('Admin.deletePermanent');
});

// Route::controller(ProdukController::class)->group(function() {
//     Route::get('Produk/', 'Fav')->name('Produk.Fav');
// });



// Middleware Admin
Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard_admin', 'AdminSessionController@index')->name('dashboard_admin');
});

// User Login, Register, Logout & Profile
Route::get('/register', function() {return view('user.LoginRegisterLogoutProfile.registerUser');})->name('/register');
Route::post('/register-proses', [SessionController::class, 'register_proses'])->name('register-proses');

Route::get('/login', [SessionController::class, 'index'])->name('login');
Route::post('/login-proses', [SessionController::class, 'login_proses'])->name('login-proses');

Route::resource('/profile', \App\Http\Controllers\ProfileController::class);
Route::get('/profileView', [ProfileController::class, 'index'])->middleware('auth')->name('profile-show');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile-update');
Route::get('/logout', [ProfileController::class, 'logout'])->name('logout');

// Admin Login, Register & Logout
Route::get('registerAdmin', [AdminSessionController::class, 'registerAdmin'])->name('registerAdmin');
Route::post('registerAdmin', [AdminSessionController::class, 'register_prosesAdmin'])->name('registerAdminProcess');

Route::get('/loginAdmin', [AdminSessionController::class, 'index'])->name('loginAdmin');
Route::post('/login-prosesAdmin', [AdminSessionController::class, 'login_prosesAdmin'])->name('login-prosesAdmin');
Route::get('/logoutAdmin', [AdminSessionController::class, 'logout'])->name('logoutAdmin');



    Route::get('/userList', [SessionController::class, 'dataUser'])->name('userList');


Route::resource('/adminTesti', \App\Http\Controllers\TestimoniController::class);

Route::controller(TestimoniController::class)->group(function() {
    Route::get('/adminTesti', 'admin')->name('adminTesti.admin');
    Route::get('/testimoni-pembeli', 'user')->name('user.user');
    Route::get('/history', 'onlyTrashTestimoni')->name('history.onlyTrashTestimoni');
    Route::delete('userSoftDelete/softdelete/{id}', 'softDelete')->name('userSoftDelete.softdelete');
    Route::put('/userSoftDelete/restore/{id}', 'restore')->name('userSoftDelete.restore');

    Route::get('/order', [OrderController::class, 'create'])->name('order.create');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::resource('/order', \App\Http\Controllers\OrderController::class);

});

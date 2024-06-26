<?php

use App\Http\Controllers\AdminSessionController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\Profile;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegionController;
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

// Route::get('/about', function () {
//     return view('user/about/index');
// });
Route::get('/about', function() {return view('user.about.index');})->name('about.index');


// Route::resource('/', \App\Http\Controllers\DashboardController::class);

Route::resource('/', \App\Http\Controllers\DashboardController::class)->names([
    'index' => 'dashboard.index',
]);

// Route::resource('/dashboard_admin', \App\Http\Controllers\SaranController::class);
Route::controller(SaranController::class)->group(function() {
    Route::get('/dashboard_admin', 'index')->name('dashboard_admin.index');
    Route::post('/dashboard_admin', 'store')->name('dashboard_admin.store');
    Route::delete('/dashboard_admin/{id}', 'destroy')->name('dashboard_admin.destroy');
    Route::get('/dashboard_admin/onlytrash', 'onlyTrashSaran')->name('dashboard_admin.onlytrash');
    Route::delete('dashboard_admin/softdelete/{id}', 'softDelete')->name('dashboard_admin.softdelete');
    Route::put('/dashboard_admin/restore/{id}', 'restore')->name('dashboard_admin.restore');
});

Route::resource('/cart', \App\Http\Controllers\CartController::class);

Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::get('/payment/create', [PaymentController::class, 'create'])->name('payment.create');
Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store');
Route::get('/payment/edit/{id}', [PaymentController::class, 'edit'])->name('payment.edit');
Route::put('/payment/update/{id}', [PaymentController::class, 'update'])->name('payment.update');
Route::delete('/payment/soft-delete/{id}', [PaymentController::class, 'softDelete'])->name('payment.softdelete');
Route::delete('/payment/destroy/{id}', [PaymentController::class, 'destroy'])->name('payment.destroy');
Route::get('/payment/only-trash', [PaymentController::class, 'onlyTrashPayment'])->name('payment.onlytrash');
Route::put('/payment/restore/{id}', [PaymentController::class, 'restore'])->name('payment.restore');


Route::controller(ProdukController::class)->group(function() {
    Route::get('Produk/', 'index')->name('Produk.index');
    Route::get('Produk/{slug_link}', 'show')->name('Produk.show');
    Route::get('/search', 'search')->name('search');
    // Route::post('/Produk/Favorite/Add/{products}', 'addFavorite')->name('Produk.favorite');
    // Route::delete('/Produk/Favorite/Remove{products}', 'Favorite')->name('Produk.removefavorite');
});

Route::controller(ProdukController::class)->group(function () {
    Route::get('/AdminProduk', 'admin')->name('Admin.admin');
    Route::get('/AdminProduk/create', 'create')->name('Admin.create');
    Route::post('/AdminProduk/kirim', 'store')->name('Admin.store');
    Route::get('/AdminProduk/edit/{slug_link}', 'edit')->name('Admin.edit');
    Route::put('/AdminProduk/update/{slug_link}', 'update')->name('Admin.update');
    Route::get('/AdminProduk/hapus/{slug_link}', 'hapus')->name('Admin.hapus');
    Route::put('/AdminProduk/softdelete/{slug_link}', 'softdelete')->name('Admin.softdelete');
    Route::get('/AdminProduk/history', 'history')->name('Admin.history');
    Route::post('/AdminProduk/restore/{slug_link}', 'restore')->name('Admin.restore');
    Route::delete('/AdminProduk/permanent-delete/{id}', 'deletePermanent')->name('Admin.deletePermanent');
});

// Route::controller(ProdukController::class)->group(function() {
//     Route::get('Produk/', 'Fav')->name('Produk.Fav');
// });


// User Login, Register, Logout & Profile
Route::get('/register', function() {return view('user.LoginRegisterLogoutProfile.registerUser');})->name('/register');
Route::post('/register-proses', [SessionController::class, 'register_proses'])->name('register-proses');

Route::get('/login', [SessionController::class, 'index'])->name('login');
Route::post('/login-proses', [SessionController::class, 'login_proses'])->name('login-proses');

Route::resource('/profile', \App\Http\Controllers\ProfileController::class);
Route::get('/profileView', [ProfileController::class, 'index'])->middleware('auth')->name('profile-show');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile-update');
Route::get('/logout', [ProfileController::class, 'logout'])->name('logout');

// Middleware Admin
Route::middleware(['admin'])->group(function() {
    Route::resource('/dashboard_admin', SaranController::class);
});

// Admin Login, Register & Logout
Route::get('registerAdmin', [AdminSessionController::class, 'registerAdmin'])->name('registerAdmin');
Route::post('registerAdmin', [AdminSessionController::class, 'register_prosesAdmin'])->name('registerAdminProcess');

Route::get('/loginAdmin', [AdminSessionController::class, 'index'])->name('loginAdmin');
Route::post('/login-prosesAdmin', [AdminSessionController::class, 'login_prosesAdmin'])->name('login-prosesAdmin');
Route::get('/logoutAdmin', [AdminSessionController::class, 'logoutAdmin'])->name('logoutAdmin');



//     Route::get('/userList', [SessionController::class, 'dataUser'])->name('userList');
//     Route::get('onlytrash', [SessionController::class, 'onlyTrashUser'])->name('user.history');
// Route::post('restore/{id}', [SessionController::class, 'restore'])->name('user.restore');
// Route::delete('destroy/{id}', [SessionController::class, 'destroy'])->name('user.destroy');
// Route::delete('softdelete/{id}', [SessionController::class, 'softDelete'])->name('user.softdelete');

Route::get('/userList', [UserController::class, 'index'])->name('userAdmin.index');
    Route::get('/userList/onlytrash', [UserController::class, 'onlyTrashUser'])->name('user.history');
Route::post('/userList/restore/{id}', [UserController::class, 'restore'])->name('user.restore');
Route::delete('/userList/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::delete('/userList/softdelete/{id}', [UserController::class, 'softDelete'])->name('user.softdelete');


Route::resource('/adminTesti', \App\Http\Controllers\TestimoniController::class);

Route::controller(TestimoniController::class)->group(function() {
    Route::get('/adminTesti', 'admin')->name('adminTesti.admin');
    Route::get('/testimoni-pembeli', 'user')->name('user.user');
    Route::get('/history', 'onlyTrashTestimoni')->name('history.onlyTrashTestimoni');
    Route::delete('userSoftDelete/softdelete/{id}', 'softDelete')->name('userSoftDelete.softdelete');
    Route::put('/userSoftDelete/restore/{id}', 'restore')->name('userSoftDelete.restore');

    Route::get('/order', [OrderController::class, 'create'])->name('order.create');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/orderAdmin', [OrderController::class, 'admin'])->name('order.admin');
    Route::get('/orderAdmin/show/{id}', [OrderController::class, 'show'])->name('order.show');
    Route::resource('/order', \App\Http\Controllers\OrderController::class);
    Route::get('onlytrash', [OrderController::class, 'onlyTrashOrder'])->name('order.history');
    Route::post('restore/{id}', [OrderController::class, 'restore'])->name('order.restore');
    Route::delete('destroy/{id}', [OrderController::class, 'destroy'])->name('order.destroy');
    Route::delete('softdelete/{id}', [OrderController::class, 'softDelete'])->name('order.softdelete');
    Route::post('/orders/{id}/update-status', [OrderController::class, 'updateStatus'])->name('orders.update-status');
    Route::get('/bukti_transaksi', [OrderController::class, 'showBuktiTransaksi'])->name('bukti-transaksi');

    
Route::get('/admin/orders/confirmed', [OrderController::class, 'confirmedOrders'])->name('admin.orders.confirmed');
Route::get('/admin/orders/processed', [OrderController::class, 'processedOrders'])->name('admin.orders.processed');
Route::get('/admin/orders/delivering', [OrderController::class, 'deliveringOrders'])->name('admin.orders.delivering');
Route::get('/admin/orders/received-waiting-confirmation', [OrderController::class, 'receivedWaitingConfirmationOrders'])->name('admin.orders.received-waiting-confirmation');
Route::get('/admin/orders/confirmed-again', [OrderController::class, 'confirmedOrdersAgain'])->name('admin.orders.confirmed-again');

    Route::controller(RegionController::class)->group(function() {
        Route::get('/region', 'index')->name('region.index');
        Route::get('/region/create', 'create')->name('region.create');
        Route::post('/region', 'store')->name('region.store');
        Route::get('/region/edit/{id}', 'edit')->name('region.edit');
    Route::put('/region/update/{id}', 'update')->name('region.update');
        Route::delete('/region/{id}', 'destroy')->name('region.destroy');
        Route::get('/region/onlytrash', 'onlyTrashRegion')->name('region.onlytrash');
        Route::delete('region/softdelete/{id}', 'softDelete')->name('region.softdelete');
        Route::put('/region/restore/{id}', 'restore')->name('region.restore');
        Route::get('/get_provinces', 'getProvinces')->name('getProvinces');
        Route::post('/get-cities', 'getCities')->name('getCities');
    });

    // Route::get('/dashboardAdmin', [DashboardAdminController::class, 'index'])->name('dashboardAdmin.index');

});

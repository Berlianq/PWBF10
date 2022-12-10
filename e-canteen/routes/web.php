<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesananController;
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

Route::middleware('auth')->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::resource('foods', FoodController::class);
        Route::get('/pesanans', [PesananController::class, 'index'])->name('pesanans.index');
        Route::get('/pesanans/{pesanan}', [PesananController::class, 'show'])->name('pesanans.show');
        Route::put('/pesanans/{pesanan}', [PesananController::class, 'updateStatus'])->name('pesanans.update-status');
        Route::delete('/pesanans/{pesanan}', [PesananController::class, 'destroy'])->name('pesanans.destroy');
    });

    Route::middleware('role:user')->name('home.')->group(function () {
        Route::get('/u/foods', [HomeController::class, 'foods'])->name('foods');
        Route::get('/u/foods/{food}', [HomeController::class, 'food'])->name('food-detail');
        Route::get('/cart', [HomeController::class, 'cartFoods'])->name('cart-foods');
        Route::post('/pesan', [HomeController::class, 'pesan'])->name('pesan');
        Route::get('/pesanan-saya', [HomeController::class, 'pesananSaya'])->name('pesanan-saya');
        Route::get('/pesanan-saya/{pesanan}', [HomeController::class, 'pesananDetailSaya'])->name('pesanan-saya-detail');
    });
    Route::middleware('role:user')->group(function () {
        Route::post('/cart/{food}', [CartController::class, 'addToCart'])->name('cart.add');
        Route::delete('/cart/{food}', [CartController::class, 'remove'])->name('cart.remove');
    });

    Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::name('home.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
});

Route::middleware('guest')->group(function () {
    // auth
    Route::get('/login', [AuthController::class, 'index'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'authenticate']);

    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/register', [AuthController::class, 'registerPost']);
});

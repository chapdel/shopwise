<?php

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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::get('/purchase', [App\Http\Controllers\HomeController::class, 'showPurchase'])->name('purchase.show');
Route::post('/orders', [App\Http\Controllers\OrderController::class, 'store'])->name('order.store')->middleware('auth');
Route::post('/cart', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::post('/logout', function () {
    auth()->logout();
    if (auth(config('shopper.auth.guard'))->user()) {
        auth(config('shopper.auth.guard'))->logout();
    }
    return redirect()->route('home');
})->name('logout')->middleware('auth');
Route::post('/cart/{slug}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
Route::get('/search', [App\Http\Controllers\SearchController::class, 'index'])->name('search');
Route::get('/product/{slug}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show');

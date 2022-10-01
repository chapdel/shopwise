<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [HomeController::class, 'index'])->name('dashboard');
Route::get('/product/{slug}', [HomeController::class, 'show'])->name('product.show');
Route::post('/cart/{slug}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::get('/checkout', [CartController::class, 'handle'])->name('checkout.handle')->middleware('auth');
Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');
require __DIR__ . '/auth.php';

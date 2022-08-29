<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\CategoryController;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Site\AccountController;
use App\Http\Controllers\Site\CheckoutController;
use App\Http\Controllers\Site\SearchController;

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
Route::view('/jquery', 'site.jquery.jquery');
Route::view('/jquerydb', 'site.jquery.jquerydb');
Route::get('/getajax', [ProductController::class, 'getajax'])->name('get.ajax');

Route::view('/', 'site.pages.homepage');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/product/{slug}',  [ProductController::class, 'show'])->name('product.show');

Route::get('/seesion/{id}', [CartController::class, 'seesion'])->name('cart.seesion');
Route::get('/database/{id}', [CartController::class, 'database'])->name('cart.database');

Route::post('/product/add/cart', [CartController::class, 'addToCartSession'])->name('product.add.cart');
Route::post('/product/add/cartDB', [CartController::class, 'addToCartDB'])->name('product.add.cartDB');

Route::get('/cart', [CartController::class, 'getCart'])->name('checkout.cart');

Route::get('/cart/item/{id}/remove', [CartController::class, 'removeItem'])->name('checkout.cart.remove');
Route::get('/cart/item/{id}/removeDB', [CartController::class, 'removeItemDB'])->name('checkout.cart.removeDB');

Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('checkout.cart.update');
Route::post('/cart/updateDB/{id}', [CartController::class, 'updateDB'])->name('checkout.cart.updateDB');

Route::get('/cart/clear', [CartController::class, 'clearCart'])->name('checkout.cart.clear');
Route::get('/cart/cleardb', [CartController::class, 'clearCartDB'])->name('checkout.cart.clearDB');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/checkout', [CheckoutController::class, 'getCheckout'])->name('checkout.index');
    Route::get('/checkout/{id}', [CheckoutController::class, 'getCheckoutDB'])->name('checkout.index.db');
    Route::post('/checkout/order', [CheckoutController::class, 'placeOrder'])->name('checkout.place.order');
    Route::get('checkout/payment/complete', [AccountController::class, 'complete'])->name('checkout.payment.complete');
    Route::get('account/orders', [AccountController::class, 'getOrders'])->name('account.orders');
});

Route::get('/search', [SearchController::class, 'search'])->name('product.search');

require 'admin.php';

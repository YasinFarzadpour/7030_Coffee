<?php

use App\Http\Controllers\Shop\CheckoutController;
use App\Http\Controllers\Shop\ProductController;
use App\Http\Controllers\Shop\HomeController;
use App\Http\Controllers\Shop\ProfileController;
use App\Http\Controllers\Shop\ShoppingCartController;
use Illuminate\Support\Facades\Route;

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

Route::get('/shop', [HomeController::class,'index'])->name('shop');

Route::get('/shop/profile', [ProfileController::class,'show'])->name('shop.profile.show');
Route::get('/shop/profile/edit', [ProfileController::class,'edit'])->name('shop.profile.edit');
Route::patch('/shop/profile/update', [ProfileController::class,'update'])->name('shop.profile.update');
Route::get('/shop/profile/orders', [ProfileController::class,'orders'])->name('shop.profile.orders');
Route::get('/shop/profile/orders/{order}', [ProfileController::class,'order'])->name('shop.profile.order');

Route::get('/products/{product}', [ProductController::class,'show'])->name('shop.products.show');
Route::get('/products', [ProductController::class,'index'])->name('shop.products.index');

Route::get('/shop/shopping-cart', [ShoppingCartController::class,'show'])->name('shop.shopping-cart.show');
Route::post('/shop/shopping-cart/add', [ShoppingCartController::class,'addToCart'])->name('shop.shopping-cart.add');
Route::patch('/shop/shopping-cart/update', [ShoppingCartController::class,'update'])->name('shop.shopping-cart.update');
Route::delete('/shop/shopping-cart/remove/{rowId}', [ShoppingCartController::class,'remove'])->name('shop.shopping-cart.remove');


Route::middleware('auth')->group(function () {
    Route::get('/shop/checkout', [CheckoutController::class, 'show'])->name('shop.checkout.show');
    Route::post('/shop/checkout/order', [CheckoutController::class, 'placeOrder'])->name('shop.checkout.place.order');
    Route::get('/shop/checkout/order/verify', [CheckoutController::class, 'verify'])->name('shop.order.verify');
});


require __DIR__.'/auth.php';

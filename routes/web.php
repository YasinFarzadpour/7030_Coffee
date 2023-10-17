<?php

use App\Http\Controllers\Shop\ProductController;
use App\Http\Controllers\Shop\HomeController;
use App\Http\Controllers\Shop\ProfileController;
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

Route::get('/products/{product}', [ProductController::class,'show'])->name('shop.products.show');
Route::get('/products', [ProductController::class,'index'])->name('shop.products.index');

require __DIR__.'/auth.php';

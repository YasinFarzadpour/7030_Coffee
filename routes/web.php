<?php

use App\Http\Controllers\Shop\ProductController;
use App\Http\Controllers\Shop\HomeController;
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

Route::get('/products/{product}', [ProductController::class,'show'])->name('shop.products.show');


require __DIR__.'/auth.php';

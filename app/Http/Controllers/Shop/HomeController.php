<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{

    public function index(){

        $categories = Category::all();
        $topSellerProducts = Product::query()->orderByDesc('created_at')->take(6)->get();
        $newestProducts = Product::query()->orderByDesc('created_at')->take(6)->get();

        return view('shop.index', [
            'topSellerProducts'=>$topSellerProducts,
            'newestProducts'=>$newestProducts,
            'categories'=>$categories
        ]);
    }
}

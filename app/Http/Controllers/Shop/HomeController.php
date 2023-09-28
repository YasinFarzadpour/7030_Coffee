<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{

    public function index(){

        $products = Product::all();
        return view('shop.index', ['products'=>$products]);
    }
}

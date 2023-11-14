<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{

    public function index(){

        $categories = Category::all();

        return view('shop.index', ['categories'=>$categories]);
    }
}

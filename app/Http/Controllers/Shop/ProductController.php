<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request){

        $categories = Category::all();
        $products = Product::query();
        if ($request->has('cate')){
            $products->whereIn('category_id',$request->cate);
        }
        switch ($request->sort_by) {
            case 'title':
                $products->orderBy('title');
                break;
            case 'price_desc':
                $products->orderByDesc('price');
                break;
            case 'price_asc':
                $products->orderBy('price');
                break;
            default:
        }

        $products = $products->paginate(8);
        return view('shop.products-all', ['products' => $products, 'categories' => $categories]);
    }

    public function show(Product $product){

        $category = $product->category;
        $products = $category->products()->orderByDesc('created_at')->take(4)->get();
        return view('shop.product-single',[
            'product'=>$product,
            'products'=>$products,
            'category'=>$category
        ]);
    }
}

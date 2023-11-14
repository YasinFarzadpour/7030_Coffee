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
        $productsQuery = Product::query();
        if ($request->has('cate')){
            $productsQuery->whereIn('category_id',$request->cate);
        }
        switch ($request->sort_by) {
            case 'title':
                $productsQuery->orderBy('title');
                break;
            case 'price_desc':
                $productsQuery->orderByDesc('price');
                break;
            case 'price_asc':
                $productsQuery->orderBy('price');
                break;
            default:
        }

        $products = $productsQuery->where('is_published', 1)->paginate(8);
        return view('shop.products-all', ['products' => $products, 'categories' => $categories]);
    }

    public function show(Product $product){

        $category = $product->category;
        $products = $category->products()->orderByDesc('created_at')->take(4)->get();
        return view('shop.product-single',[
            'product'=>$product,
            'products'=>$products,
        ]);
    }
}

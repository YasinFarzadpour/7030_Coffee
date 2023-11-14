<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function show()
    {
        return view('shop.shopping-cart-show');
    }

    public function addToCart(Request $request)
    {
        $product = Product::query()->find($request->product_id);
        $qty = (int)$request->qty;
        Cart::add($product, $qty);
        $html = view('components.shop.shopping-cart')->render();
        return response()->json(['message'=>'done','view'=>$html]);
    }

    public function update(Request $request)
    {
        $updateCart = $request->update_cart;
        foreach ($updateCart as $item){
            $qty = (int) $item['qty'];
            $row_id = $item['row_id'];
            Cart::update($row_id, $qty);
        }
        return back();
    }

    public function remove($rowId){
        Cart::remove($rowId);
        $cartTotal = Cart::total();
        $html = view('components.shop.shopping-cart')->render();
        return response()->json(['message'=>'done','cartTotal'=>$cartTotal,'view'=>$html]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::user()->can('View Products')) {
            abort(403);
        }
        $products = Product::paginate(8);
        return view('admin.products.products-all', ['products' => $products]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->can('Create Products')) {
            abort(403);
        }
        $categories = Category::all();
        return view('admin.products.create-product', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $inputs = $request->all();
        $inputs['user_id'] = auth()->id();
        $product = Product::create($inputs);
        if ($images = $request->file('images')) {
            foreach ($images as $image) {
                $image->store('images');
                $product->images()->create([
                    'file_name' => $image->hashName()
                ]);
            }
        }
        Session::flash('store-message', 'Product Created Successfully.');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        if (!Auth::user()->can('View Products')) {
            abort(403);
        }
        return view('admin.products.product-single', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        if (!Auth::user()->can('Edit Products')) {
            abort(403);
        }
        $categories = Category::all();
        return view('admin.products.edit-product', ['categories' => $categories, 'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $inputs = $request->all();
        if ($images = $request->file('images')) {
            if ($oldImages = $product->images) {
                foreach ($oldImages as $oldImage) {
                    Storage::delete('images/'.$oldImage->getRawOriginal('file_name'));
                    $oldImage->delete();
                }
            }
            foreach ($images as $image) {
                $image->store('images');
                $product->images()->create([
                    'file_name' => $image->hashName()
                ]);
            }
        }
        $product->update($inputs);
        Session::flash('update-message', 'Product Updated Successfully.');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (!Auth::user()->can('Delete Products')) {
            abort(403);
        }
        if ($oldImages = $product->images) {
            foreach ($oldImages as $oldImage) {
                Storage::delete('images/'.$oldImage->getRawOriginal('file_name'));
                $oldImage->delete();
            }
        }
        $product->delete();
        Session::flash('destroy-message', 'Product Deleted Successfully.');
        return back();
    }
}

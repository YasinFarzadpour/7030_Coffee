<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::user()->can('View Categories')){
            abort(403);
        }
        $categories = Category::all();
        return view('admin.categories-all', ['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->can('Create Categories')) {
            abort(403);
        }
        return view('admin.create-category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('Create Categories')) {
            abort(403);
        }
        $inputs = $request->all();
        Category::create($inputs);
        Session::flash('store-message', 'Category Created Successfully.');
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        if (!Auth::user()->can('View Categories')){
            abort(403);
        }
        return view('admin.category-single', ['category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        if (!Auth::user()->can('Edit Categories')){
            abort(403);
        }
        return view('admin.edit-category', ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        if (!Auth::user()->can('Edit Categories')){
            abort(403);
        }
        $inputs = $request->all();
        $category->update($inputs);
        Session::flash('update-message', 'Category Updated Successfully.');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        if (!Auth::user()->can('Delete Categories')){
            abort(403);
        }
        $category->delete();
        Session::flash('destroy-message', 'Category Deleted Successfully.');
        return back();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){

        if (!Auth::user()->can('View Admin')){
            abort(403);
        }
        return view('admin.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::user()->can('View Permissions')){
            abort(403);
        }
        $permissions = Permission::paginate(8);
        return view('admin.roles-permissions.permissions-all',['permissions'=>$permissions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->can('Create Permissions')){
            abort(403);
        }
        return view('admin.roles-permissions.create-permission');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('Create Permissions')){
            abort(403);
        }
        $inputs = $request->all();
        Permission::create($inputs);
        Session::flash('store-message', 'Permission Created Successfully.');
        return redirect()->route('permissions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(permission $permission)
    {
        if (!Auth::user()->can('Edit Permissions')){
            abort(403);
        }
        return view('admin.roles-permissions.edit-permission', ['permission'=>$permission]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, permission $permission)
    {
        if (!Auth::user()->can('Edit Permissions')){
            abort(403);
        }
        $inputs = $request->all();
        $permission->update($inputs);
        Session::flash('update-message', 'Permission Updated Successfully.');
        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(permission $permission)
    {
        if (!Auth::user()->can('Delete Permissions')){
            abort(403);
        }
        $permission->delete();
        Session::flash('destroy-message', 'Permission Deleted Successfully.');
        return back();
    }
}

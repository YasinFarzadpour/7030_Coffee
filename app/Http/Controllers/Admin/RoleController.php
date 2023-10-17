<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::user()->can('View Roles')){
            abort(403);
        }
        $roles = Role::paginate(8);
        $permissions = Permission::all();
        return view('admin.roles-permissions.roles-all',['roles'=>$roles, 'permissions'=>$permissions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->can('Create Roles')){
            abort(403);
        }
        $permissions = Permission::all();
        return view('admin.roles-permissions.create-role', ['permissions'=>$permissions]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('Create Roles')){
            abort(403);
        }
        $inputs = $request->all();
        $role = Role::create($inputs);
        $role->givePermissionTo($inputs['permissions']);
        Session::flash('store-message', 'Role Created Successfully.');
        return redirect()->route('roles.index');
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
    public function edit(role $role)
    {
        if (!Auth::user()->can('Edit Roles')){
            abort(403);
        }
        $permissions = Permission::all();
        return view('admin.roles-permissions.edit-role', ['role'=>$role, 'permissions'=>$permissions]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, role $role)
    {
        if (!Auth::user()->can('Edit Roles')){
            abort(403);
        }
        $inputs = $request->all();
        $role->update($inputs);
        $role->syncPermissions($inputs['permissions']);
        Session::flash('update-message', 'Role Updated Successfully.');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(role $role)
    {
        if (!Auth::user()->can('Delete Roles')){
            abort(403);
        }
        $role->delete();
        Session::flash('destroy-message', 'Role Deleted Successfully.');
        return back();
    }
}

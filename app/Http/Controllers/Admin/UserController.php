<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::user()->can('View Users')){
            abort(403);
        }
        $users = User::paginate(8);
        return view('admin.users.users-all', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->can('Create Users')) {
            abort(403);
        }
        $roles = Role::all();
        return view('admin.users.create-user', ['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $inputs = $request->all();
        if ($request->image){
            $inputs['image'] = $request->file('image')->store('images');
        }
        $user = User::create($inputs);
        $user->assignRole($inputs['roles']);
        Session::flash('store-message', 'User Created Successfully.');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if (!Auth::user()->can('View Users')){
            abort(403);
        }
        $orders = $user->orders;
        return view('admin.users.user-single', ['user'=>$user , 'orders'=>$orders]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if (!Auth::user()->can('Edit Users')){
            abort(403);
        }
        $roles = Role::all();
        return view('admin.users.edit-user', ['roles'=>$roles,'user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $inputs = $request->all();
        if ($request->image){
            if ($user->image){
                Storage::delete($user->getRawOriginal('image'));
            }
            $inputs['image'] = $request->file('image')->store('images');
        }
        $user->update($inputs);
        $user->syncRoles($inputs['roles']);
        Session::flash('update-message', 'User Updated Successfully.');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (!Auth::user()->can('Delete Users')){
            abort(403);
        }
        if ($user->image){
            Storage::delete($user->getRawOriginal('image'));
        }
        $user->delete();
        Session::flash('destroy-message', 'User Deleted Successfully.');
        return back();
    }
}

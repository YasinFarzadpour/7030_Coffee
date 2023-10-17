<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show(){
        $user = auth()->user();
        return view('shop.profile-show', ['user'=>$user]);
    }

    public function edit(Request $request){
        return view('shop.edit-profile', ['user' => $request->user()]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        if ($request->image){
            if ($request->user()->image){
                Storage::delete($request->user()->getRawOriginal('image'));
            }
            $request->user()->image = $request->file('image')->store('images');
        }

        $request->user()->save();
        Session::flash('update-message', 'Profile Updated Successfully.');
        return Redirect::route('shop.profile.show');
    }
}

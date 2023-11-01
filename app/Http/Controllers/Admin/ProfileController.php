<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
     public function index(){
        return view('admin.profile.index');
     }

     public function profileUpdate(Request $request){

        $user = User::findOrFail(Auth::id());
        $request->validate([
            'name'=>'required',
            'email'=>"required",
            'image'=>'sometimes|nullable|image'
        ]);

        if($request->hasFile('image')){
            $deletepath=$user->image;
            Storage::disk('public')->delete($deletepath);
            $path = $request->file('image')->store('user_images','public');
        }else{
            $path = $user->image;
        }
        $user->name=$request->name;
        $user->email=$request->email;
        $user->mobile=$request->mobile;
        $user->image=$path;
        $user->save();
        flash('Profile Update Success')->success();
        return redirect('/admin/profile');
    }


    public function updatePassword(Request $request){
         $request->validate([
            'old_password'=>'required',
            'password'=>'required|confirmed'
         ]);

         $oldPassword=Auth::user()->password;
         if(Hash::check($request->old_password,$oldPassword)){

            if(!Hash::check($request->password,$oldPassword)){
                $user = User::find(Auth::id());
                $user->password=Hash::make($request->password);
                $user->save();
                flash('Password Change Success')->success();
                Auth::logout();
                return redirect()->back();
            }else{
                flash('New password and old password are same')->error();
                return redirect()->back();
            }

         }else{
            flash('Current password is not match')->error();
            return redirect()->back();
         }
    }
}

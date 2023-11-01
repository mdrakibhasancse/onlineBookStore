<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function customerLogin(){
        return view('frontend.home.customer-login');
   }

   public function customerSignup(){
       return view('frontend.home.customer-signup');
   }

  public function SignupStore(Request $request){
       $request->validate([
           'name'=>'required',
           'email'=>'required|unique:users|email',
           'mobile'=>'required|min:11|numeric|unique:users',
           'password'=>'required|confirmed|min:6'
       ]);

       $user= new User();
       $user->name=$request->name;
       $user->email=$request->email;
       $user->mobile=$request->mobile;
       $user->password=Hash::make($request->password);
       $user->save();
       Toastr::success('registration success', 'success');
       return redirect('/customer-login');
  }

    public function dashboard(){
        $data['user'] = Auth::user();
        return view('frontend.home.customer.dashboard',$data);
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
        Toastr::success('Update Profile', 'success');
        return redirect('/dashboard');
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
                Toastr::success('Password Change Success', 'success');
                Auth::logout();
                return redirect()->back();
            }else{
                Toastr::error('New password and old password are same', 'error');
                return redirect()->back();
            }

         }else{
            Toastr::error('Current password is not match', 'error');
            return redirect()->back();
         }
    }


}

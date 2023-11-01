<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Session\Session;

class ShippingController extends Controller
{
    public function shipping(){
        return view('frontend.home.shipping');
    }


    public function shippingStore(Request $request){
          $request->validate([
             'name'=>'required',
             'address'=>'required',
             'mobile'=>'required|digits:11'
          ]);

          $shipping = new Shipping();
          $shipping->user_id = Auth::user()->id;
          $shipping->name = $request->name;
          $shipping->email = $request->email;
          $shipping->mobile = $request->mobile;
          $shipping->address = $request->address;
          $shipping->save();
          $request->session()->put('shipping_id', $shipping->id);
          Toastr::success('shipping success', 'success');
          return redirect('cart/payment');


    }

}

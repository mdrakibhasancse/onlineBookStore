<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class PaymentController extends Controller
{
    public function payment(){
        return view('frontend.home.payment');
    }

     public function paymentStore(Request $request){

        if($request->book_id == NULL){
            return redirect()->back()->with('message','Please Add Any Book');
        }else{
            $request->validate([
                'payment_method'=>'required',
            ]);

            if($request->payment_method == 'BKash' && $request->transaction_no == NULL){
                return redirect()->back()->with('message','Please enter transaction_number');
            }
            $payment = new Payment();
            $payment->payment_method=$request->payment_method;
            $payment->transaction_no=$request->transaction_no;
            $payment->save();

            $order = new Order();
            $order->user_id= Auth::user()->id;
            $order->shipping_id= $request->session()->get('shipping_id');
            $order->payment_id =$payment->id;

            $order_data = Order::orderBy('id','desc')->first();
            if($order_data == null){
               $first = '0';
               $order_no = $first+1;
            }else{
               $order_data = Order::orderBy('id','desc')->first()->order_no;
               $order_no = $order_data+1;
            }
            $order->order_no =$order_no;
            $order->total_tk= $request->total_tk;
            $order->status= '0';
            $order->save();


           $contents = \Cart::getContent();

           foreach($contents as $content){
               $details = new OrderDetail();
               $details->order_id = $order->id;
               $details->book_id = $content->id;
               $details->quantity = $content->quantity;
               $details->save();
           }
        }


        \Cart::clear();
        Toastr::success('order successfully', 'success');
        return redirect('cart/order_list');
   }

   public function order_list(){
       $data['orders'] = Order::where('user_id',Auth::user()->id)->get();
       return view('frontend.home.order_list',$data);
   }

   public function orderDetails($id){

       $orderData = Order::find($id);
       $data['order'] = Order::where('id',$orderData->id)->where('user_id',Auth::user()->id)->first();
       if($data['order'] == false){
         return redirect()->back();
       }else{
          $data['contact'] = Contact::first();
          $data['order'] = Order::where('id',$orderData->id)->where('user_id',Auth::user()->id)->first();
          return view('frontend.home.order_details',$data);
       }

   }


   public function orderPrint($id){

    $orderData = Order::find($id);
    $data['order'] = Order::where('id',$orderData->id)->where('user_id',Auth::user()->id)->first();
    if($data['order'] == false){
      return redirect()->back();
    }else{
       $data['contact'] = Contact::first();
       $data['order'] = Order::where('id',$orderData->id)->where('user_id',Auth::user()->id)->first();
       return view('frontend.home.order_print',$data);
    }

}

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Notifications\OrderApproved;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function approvedList(){
        $data['orders'] = Order::where('status','1')->get();
        return view('admin.order.approved_list',$data);
    }


    public function pendingList(){
        $data['orders'] = Order::where('status','0')->get();
        return view('admin.order.pending_list',$data);
    }

    public function orderDetails($id){
          $data['order'] = Order::find($id);
          return view('admin.order.order_details',$data);
    }

    public function approve($id){
        $order = Order::find($id);
        if($order->status=='0'){
            $order->status = '1';
            $order->save();
            flash('order approved Success')->success();
        }else{
              flash('order already approved')->success();
        }

        return redirect()->back();
    }
}

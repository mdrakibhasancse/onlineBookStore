@extends('admin.layouts.app')
@section('title','Order Details')

@section('page_title')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Order Details</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Order Details</li>
      </ol>
    </div>
  </div>
@endsection
@section('content')
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Order Details List</h3>
              <div class="card-tools">
                  <a class="btn btn-success" href="{{ url('admin/orders/approved') }}">Back</a>
              </div>
            </div>
            <div class="card-body">
                 <table class="text-center" width="100%" border="1">
                     <tr>
                        <td style="width: 30%">Billing Information</td>
                        <td style="width: 70%; padding: 5px;" colspan="2">
                            <strong>Name :</strong>{{ $order->shipping->name }} &nbsp;&nbsp;&nbsp;&nbsp;
                            <strong>Mobile Number :</strong>{{ $order->shipping->mobile }}<br>
                            <strong>Email :</strong>{{ $order->shipping->email }}&nbsp;&nbsp;&nbsp;&nbsp;
                            <strong>Address :</strong>{{ $order->shipping->address }}<br>
                            <strong>Payment : </strong>{{ $order->payment->payment_method }}
                                @if($order->payment->payment_method == 'BKash')
                                    (Transaction_no : {{$order->payment->transaction_no}})
                                @endif&nbsp;&nbsp;&nbsp;&nbsp;
                            <strong>Order No : </strong>#{{ $order->order_no }}
                        </td>
                     </tr>
                     <tr>
                       <td colspan="3" style="font-size: 30px"> <strong><u>Order Details</u></strong></td>
                     </tr>

                     <tr>
                        <td>Book Name</td>
                        <td>Image</td>
                        <td>Quantity & Price</td>
                     </tr>

                     @foreach ($order->order_details as $details)
                       <tr>
                        <td>{{ $details->book->name}}</td>
                        <td style="padding: 5px"> <img style="width:100px; height:100px" src="{{asset("/storage/".$details->book->image)}}"></td>
                        <td>
                            @php
                            $subTotal =  $details->quantity * $details->book->price_discount;
                            @endphp
                            {{ $details->quantity}} x {{ $details->book->price_discount}} =
                            {{ $subTotal }} Tk
                        </td>
                       </tr>
                     @endforeach
                     <tr>
                        <td colspan="2">
                             <strong style="font-size: 25px">Grand Total :</strong>
                        </td>
                        <td>
                          <strong>  {{$order->total_tk}} Tk</strong>
                       </td>
                     </tr>
                 </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
@endsection



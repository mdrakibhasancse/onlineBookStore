@extends('frontend.layouts.app')
@section('title','order_list')
@section('content')
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                   <h2>Customer Order List</h2>
                   <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="{{ url('/')}}">Home</a>
                        </li>
                        <li>Customer Order List</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" style="margin:40px 0px 40px 0px">
     <div class="col-md-10 col-md-offset-1">
        <u><h4 style="font-size: 30px;">Customer Order List : </h4></u>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Order Number</th>
                        <th>Total Amount</th>
                        <th>Payment Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td># {{ $order->order_no }}</td>
                        <td>{{ $order->total_tk }}</td>
                        <td>{{ $order->payment->payment_method }}
                            @if($order->payment->payment_method == 'BKash')
                                (Transaction_no : {{$order->payment->transaction_no}})
                            @endif
                        </td>
                        <td>
                            @if($order->status == '0')
                             <span class="btn btn-danger btn-sm" >Unapproved</span>
                             @elseif($order->status == '1')
                             <span class="btn btn-primary btn-sm">Approved</span>
                             @endif
                        </td>
                        <td>
                            <a title="Details" href="{{url("cart/order/details/$order->id")}}" class="btn btn-primary btn-sm"> <i class=" fa fa-eye"></i></a>
                            <a title="Print" target="_blank" href="{{url("cart/order/print/$order->id")}}" class="btn btn-info btn-sm"><i class=" fa fa-print"></i></a>
                        </td>
                   </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
     </div>
</div>
@endsection




@extends('frontend.layouts.app')
@section('title','Order Details')
@section('content')

        <!-- Breadcrumbs Area Start -->
        <div class="breadcrumbs-area" style="margin-bottom:40px;">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
					    <div class="breadcrumbs">
					       <h2>Order Details</h2>
					       <ul class="breadcrumbs-list">
						        <li>
						            <a title="Return to Home" href="index.html">Home</a>
						        </li>
						        <li>Order Details</li>
						    </ul>
					    </div>
					</div>
				</div>
			</div>
		</div>
		<!-- Breadcrumbs Area Start -->
        <!-- Shop Area Start -->
        <div class="shopping-area section-padding" style="margin-bottom:40px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-9 col-xs-12">
                        <div class="wishlist-right-area table-responsive">
                            <table class="text-center" width="100%" border="1">
                                <tr>
                                    <td colspan="2">
                                        <strong>{{ $setting->name }}</strong> <br>
                                        <strong>{{ $setting->email }}</strong><br>
                                        <strong>{{ $setting->address }}</strong><br>
                                        <strong>{{ $setting->mobile }}</strong>
                                    </td>
                                    <td><strong>Order No : </strong>#{{ $order->order_no }}</td>
                                </tr>
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
                                   </td>
                                </tr>
                                <tr>
                                  <td colspan="3" style="font-size: 25px"><strong>Order Details</strong></td>
                                </tr>

                                <tr>
                                   <td>Book Name</td>
                                   <td>Image</td>
                                   <td>Quantity & Price</td>
                                </tr>

                                @foreach ($order->order_details as $details)
                                  <tr>
                                   <td>{{ $details->book->name}}</td>
                                   <td style="padding: 5px"> <img style="width:80px; height:80px" src="{{asset("/storage/".$details->book->image)}}"></td>
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
                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Area End -->
		<!-- Footer Area Start -->
@endsection

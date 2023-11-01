@extends('frontend.layouts.app')
@section('title','check_out')
@section('content')
<!-- //check out -->
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                   <h2>Checkout List</h2>
                   <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="{{ url("/")}}">Home</a>
                        </li>
                        <li>Checkout List</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="checkout">
	<div class="container">
		<h3>My Shopping</h3>
		<div class="table-responsive table-bordered checkout-right animated wow slideInUp" data-wow-delay=".5s">
			<table class="timetable_sub">
				<thead>
					<tr>
						<th>Remove</th>
						<th>Book Image</th>
						<th>Quantity</th>
						<th>Book Name</th>
						<th>Book Price</th>

					</tr>
				</thead>

                 @foreach ($cartCollection as $cart)
                 <tr class="rem1">
                    <td class="invert-closeb">
                     <a href="{{ url("/cart/remove/$cart->id")}}">
                        <div class="rem">
                            <div class="close1"><img width="200" src="{{asset("/frontend/img/close.png")}}" alt="" srcset=""> </div>
                        </div>
                     </a>
                    </td>
                    <td class="invert-image"><a href="single.html"><img style="width: 60px; height: 60px;" src="{{asset("/storage/".$cart->attributes->image)}}" alt=" " class="img-responsive" /></a></td>
                    <td class="invert">
                        <div class="quantity-select">
                            {{-- <a href="{{ url("/cart/remove_one_book/$cart->id")}}"><div class="entry value-minus">&nbsp;</div></a> --}}
                            <div class="entry value-minus" onclick="cartRemove({{ $cart->id }})">&nbsp;</div>
                            <form action="{{ url("cart/update/$cart->id")}}" method="post" style="display: inline">
                                @csrf
                                 <span>
                                     <input type="text" name="card_value" id="card_value_{{$cart->id}}" style="width: 3em; height:2.85em" value="{{ $cart->quantity }}">
                                 </span>
                            </form>
                            <div class="entry value-plus" onclick="cartAdd({{$cart->id}})">&nbsp;</div>
                            {{-- <a href="{{ url("/cart/add_one_book/$cart->id")}}"><div class="entry value-plus">&nbsp;</div></a> --}}
                         </div>
                   </td>
                    <td class="invert">{{ $cart->name }}</td>
                    <td  id ="price" class="invert">Tk.{{ $cart->price * $cart->quantity }}</td>
                </tr>

             @endforeach

	     </table>

           @auth
           @if(Session::get('shipping_id') == NULL)
            <div class="place-order text-right">
                <a href="{{ url('/cart/shipping')}}" style="margin: 10px;" class="btn btn-lg cheek_out_button">PROCEED</a>
            </div>
            @elseif(Session::get('shipping_id') != NULL)
            <div class="place-order text-right">
                <a href="{{ url('/cart/payment')}}" style="margin: 10px;" class="btn btn-lg cheek_out_button">PROCEED</a>
            </div>
            @endif
            @else
            <div class="place-order text-right ">
                <a href="{{ url('/customer-login')}}" style="margin: 10px;" class="btn  btn-lg cheek_out_button">PROCEED</a>
             </div>
           @endauth


		</div>

		   <div class="checkout-left">

				<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
					<a href="{{ url('/')}}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Home</a>
				</div>

                <style>
                    .font-wosome-style{
                        font-size: 30px;
                        margin-right: 10px;
                        text: center;
                    }
                </style>

                <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
					<h4></i>Shopping Book</h4>
					<ul>
                        @foreach ($cartCollection as $cart)
                           <li>{{ $cart->name }} <i>-</i> <span>{{ $cart->price * $cart->quantity }}Tk</span></li>
                        @endforeach
                        <hr>
						<li><strong>Total Price :</strong> <span>{{ $subTotal }}Tk</span></li>
					</ul>

				</div>
				<div class="clearfix"> </div>

			</div>

	</div>
</div>
<!-- //check out -->

		<!-- Our Team Area Start -->
		<div class="our-team-area">
		    <h2 class="section-title">OUR AUTHOR</h2>
		    <div class="container">
		        <div class="row">
		        <div class="team-list indicator-style">
                    @foreach ($authors as $author)
                    <div class="col-md-3">
		                <div class="single-team-member">
		                    <a href="#">
		                        <img style="width: 200px; height:250px;" src="{{asset("/storage/$author->image")}}" alt="">
		                    </a>
		                    <div class="member-info">
		                        <a href="#">{{ $author->name }}</a>
		                    </div>
		                </div>
		            </div>
                    @endforeach
		        </div>
		        </div>
		    </div>
		</div>
		<!-- Our Team Area End -->


@endsection

@push('scripts')
    <script>
     function cartRemove(id){

        $.ajax({
            type:"GET",
            url: "/cart/remove_one_book/"+id,
            success: function(result){
                window.location.reload();
             }
        });
     }

     function cartAdd(id){

        $.ajax({
            type:"GET",
            url: "/cart/add_one_book/"+id,
             success: function(result){
                window.location.reload();
             }
        });
     }

     </script>
@endpush

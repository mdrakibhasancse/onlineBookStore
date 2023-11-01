@extends('frontend.layouts.app')
@section('title', 'payment')
@section('content')
    <!-- //check out -->
    <div class="breadcrumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs">
                        <h2>Payment Method</h2>
                        <ul class="breadcrumbs-list">
                            <li>
                                <a title="Return to Home" href="{{ url('/') }}">Home</a>
                            </li>
                            <li>Payment Method</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Check Out Area Start -->
    <div class="check-out-area section-padding" style="padding-top: 50px">
        <div class="container">



            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <span><i class="fa fa-money"></i></span>
                        Order Review
                    </h4>
                </div>


                <div class="panel-body no-padding">
                    <div class="order-review" id="checkout-review" style="padding-top: 20px">
                        <div class="table-responsive" id="checkout-review-table-wrapper">
                            <table class="data-table" id="checkout-review-table">
                                <thead>
                                    <tr>
                                        <th rowspan="1">Product Name</th>
                                        <th colspan="1">Price</th>
                                        <th rowspan="1">Qty</th>
                                        <th colspan="1">Subtotal</th>
                                        <th colspan="1">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartCollection as $cart)
                                        <tr>
                                            <td>
                                                <h3 class="product-name">{{ $cart->name }}</h3>
                                            </td>
                                            <td><span class="cart-price"><span
                                                        class="check-price">{{ $cart->price }}TK</span></span></td>
                                            <td>{{ $cart->quantity }}</td>
                                            <!-- sub total starts here -->
                                            <td><span class="cart-price"><span
                                                        class="check-price">{{ $cart->price * $cart->quantity }}Tk</span></span>
                                            </td>

                                            <td>
                                                <a href="{{ url("/cart/remove/$cart->id")}}">
                                                    <i class="fa fa-close" style="font-size:25px;color:black"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" style="text-align:right">Grandtotal</td>
                                        <td><span class="check-price">{{ $subTotal }}Tk</span></td>
                                    </tr>

                                </tfoot>
                            </table>
                        </div>
                        <div id="checkout-review-submit">
                            <div class="cart-btn-3" id="review-buttons-container">
                                <p class="left">Forgot an Item? <a href="{{ url('/') }}">Edit Your Cart</a></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <span><i class="fa fa-money"></i></span>
                                Payment Information
                            </h4>
                        </div>

                        <div class="panel-body no-padding">
                            <div class="payment-met">

                                @if(Session::get('message'))
                                <div class="alert alert-danger alert-dismissible">
                                    <button class="close" style="color: red" data-dismiss="alert">&times;</button>
                                    <strong>{{Session::get('message')}}</strong>
                                </div>
                               @endif

                                <form action="{{ url('/cart/payment/store') }}" id="payment-form" method="post">
                                    @csrf

                                    @foreach ($cartCollection as $cart)
                                        <input type="hidden" name="book_id" value="{{ $cart->id }}">
                                    @endforeach
                                    <ul class="form-list" id="payment_method">
                                        <input type="hidden" name="total_tk" value="{{ $subTotal }}">
                                        <li class="control">
                                            <input type="radio" class="radio" title="Hand Cash" name="payment_method"
                                                id="payment_method" value="Hand_Cash">
                                            <label for="payment_methodo">Hand Cash </label>
                                        </li>
                                        <li class="control">
                                            <input type="radio" class="radio" title="Bkash" name="payment_method"
                                                id="payment_method" value="BKash">
                                            <label for="payment_method">Bkash </label>
                                        </li>

                                        @error('payment_method')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror


                                        <div class="show_data" style="display: none;">
                                            <span>BKash No: 01976009329</span><br>
                                            <input type="text" style="padding: 3px; margin-bottom:10px;"
                                                name="transaction_no" placeholder="write transaction_no">
                                        </div>
                                    </ul>
                                    <div class="buttons-set">
                                        <button class="btn btn-default">CONTINUE</button>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Check Out Area End -->

@endsection


@push('scripts')
    <script>
        $(document).on('change', '#payment_method', function() {
            var payment_method = $(this).val();
            if (payment_method == 'BKash') {
                $('.show_data').show();
            } else if (payment_method == 'Hand_Cash') {
                $('.show_data').hide();
            }
        });
    </script>
@endpush

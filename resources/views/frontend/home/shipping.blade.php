@extends('frontend.layouts.app')
@section('title', 'shipping')
@section('content')
    <!-- //check out -->
    <div class="breadcrumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs">
                        <h2>Billing Information</h2>
                        <ul class="breadcrumbs-list">
                            <li>
                                <a title="Return to Home" href="{{ url('/') }}">Home</a>
                            </li>
                            <li>Billing Information</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Check Out Area Start -->
    <div class="check-out-area section-padding" style="padding-top: 50px">
        <div class="container">
            <div class="row">
                <form action="{{ url('/cart/shipping/store')}}" method="post">
                    @csrf
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading" id="headingTwo">
                            <h4 class="panel-title">
                                <span><i class="fa fa-truck"></i></span>
                                Billing Information
                            </h4>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="form-row">
                                        <input type="text" name="name" placeholder="Full Name *">
                                        @error('name')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </p>
                                </div>

                                <div class="col-md-12">
                                    <p class="form-row">
                                        <input type="address" name="address" placeholder="Address *">
                                        @error('name')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </p>
                                </div>


                                <div class="col-md-6">
                                    <p class="form-row">
                                        <input type="email" name="email" placeholder="Email Address">
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="form-row">
                                        <input type="text" name="mobile" placeholder="Mobile *">
                                        @error('mobile')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </p>
                                </div>

                            </div>
                            <div id="checkout-review-submit">
                                <div class="cart-btn-3" id="review-buttons-container">
                                    <button type="submit" title="Place Order" class="btn btn-default"><span>Place
                                            Order</span></button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- Check Out Area End -->

@endsection

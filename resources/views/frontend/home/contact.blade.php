@extends('frontend.layouts.app')
@section('title','Contact')
@section('content')
<div class="breadcrumbs-area" style="margin-bottom:40px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                   <h2>Contact</h2>
                   <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="{{ url('/')}}">Home</a>
                        </li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Address Information Area Start -->
<div class="address-info-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-4 hidden-sm">
                <div class="address-single">
                    <div class="all-adress-info">
                        <div class="icon">
                            <span><i class="fa fa-user-plus"></i></span>
                        </div>
                        <div class="info">
                            <h3>PHONE</h3>
                            <p>{{ $setting->mobile }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="address-single">
                    <div class="all-adress-info">
                        <div class="icon">
                            <span><i class="fa fa-map-marker"></i></span>
                        </div>
                        <div class="info">
                            <h3>ADDRESS</h3>
                            <p>{{ $setting->address }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="address-single no-margin">
                    <div class="all-adress-info">
                        <div class="icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="info">
                            <h3>E-MAIL</h3>
                            <p>{{ $setting->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<!-- Address Information Area End -->
<!-- Contact Form Area Start -->
<div class="contact-form-area">
    <div class="container">
        <div class="about-title">
            <h3>LEAVE A MESSAGE</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('/contact')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-5">
                            <div class="contact-form-left">
                                <input type="text" name="name" placeholder="Your Name" />
                                <input type="email" name="email" placeholder="Your Email" />
                                <input type="text" name="phone" placeholder="Your phone"/>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="contact-form-right">
                                <div class="input-message">
                                    <textarea name="message" id="message" placeholder="Your Message"></textarea>
                                    <input class="btn btn-default" type="submit" value="SEND" name="submit" id="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact Form Area End -->

@endsection




@extends('frontend.layouts.app')
@section('title', 'Fatured_BooK')
@section('content')

    <div class="breadcrumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs">
                        <h2>SHOP BOOK</h2>
                        <ul class="breadcrumbs-list">
                            <li>
                                <a title="Return to Home" href="{{ url('/') }}">Home</a>
                            </li>
                            <li>SHOP BOOK</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="shopping-area section-padding">
        <div class="container" style="margin-bottom: 30px;">
            <div class="row">

                    @foreach ($featuredBooks as $book)
                        <div class="col-md-3 col-sm-6">
                            <div class="single-banner">
                                <div class="product-wrapper">
                                    <a href="{{ url("/single_book/$book->id") }}" class="single-banner-image-wrapper">
                                        <img style="height:280px;  width:100%;" src="{{ asset("/storage/$book->image") }}">
                                        <div style="text-align: center">
                                            <span
                                                style="font-size: 20px; font-weight:bold">Tk.{{ $book->price_discount }}</span>
                                            @if ($book->discount_amount)
                                                <del> Tk.{{ $book->price }}</del>
                                            @endif
                                        </div>

                                    </a>
                                    <div class="product-description">
                                        <div class="functional-buttons">
                                            <a href="{{ url("cart/add/$book->id") }}" title="Add to Cart">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>

                                            <a href="{{ url("single_book/$book->id") }}" title="Quick view">
                                                <i class="fa fa-compress"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner-bottom text-center">
                                    <a style="color: red"
                                        href="{{ url("/single_book/$book->id") }}">{{ $book->name }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach


            </div>
            {{ $featuredBooks->links()}}
        </div>

    </div>

    <!-- Shop Area End -->

@endsection

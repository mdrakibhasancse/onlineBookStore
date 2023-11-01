@extends('frontend.layouts.app')
@section('title','Home')
@section('content')

    <!-- slider Area Start -->
    <div class="slider-area">
        <div class="bend niceties preview-1">
            <div id="ensign-nivoslider" class="slides">
                <img src="{{asset("/frontend/img/slider/1.jpg")}}" alt="" title="#slider-direction-1"  />
                <img src="{{asset("/frontend/img/slider/2.jpg")}}" alt="" title="#slider-direction-2"  />
            </div>
            <!-- direction 1 -->
            <div id="slider-direction-1" class="text-center slider-direction">
                <!-- layer 1 -->
                <div class="layer-1">
                    <h2 class="title-1">LET’S WRITE IMAGINE</h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-2">
                    <p class="title-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <!-- layer 3 -->
                <div class="layer-3">
                    <a href="#" class="title-3">SEE MORE</a>
                </div>
                <!-- layer 4 -->
                <div class="layer-4">
                     <form action="{{ url("/search") }}" class="title-4" method="GET">
                            <input type="text" name="search" id="search" onfocus="search_show()" onblur="search_hide()" onkeyup="searchBook()" placeholder="Enter your book title here">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>

                     <div id="bookSearch">

                     </div>

                </div>

            </div>
            <!-- direction 2 -->
            <div id="slider-direction-2" class="slider-direction">
                <!-- layer 1 -->
                <div class="layer-1">
                    <h2 class="title-1">LET’S WRITE IMAGINE</h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-2">
                    <p class="title-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <!-- layer 3 -->
                <div class="layer-3">
                    <a href="#" class="title-3">SEE MORE</a>
                </div>
                <!-- layer 4 -->
                <div class="layer-4">
                     <form action="{{ url("/search") }}" class="title-4" method="GET">
                         <input type="text" name="search" id="search" onfocus="search_show()" onblur="search_hide()" onkeyup="searchBook()" placeholder="Enter your book title here">
                         <button type="submit"><i class="fa fa-search"></i></button>
                     </form>
                     <div id="bookSearch">

                    </div>
                 </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!-- Online Banner Area Start -->
    <div class="online-banner-area">
        <div class="container">
            <div class="banner-title text-center">
                <h2>ONLINE <span>BOOK STORE</span></h2>
                <p>The Online Books Guide is the biggest big store and the biggest books library in the world that has alot of the popular and the most top category books presented here. Top Authors are here just subscribe your email address and get updated with us.</p>
            </div>
            <div class="row">
                <div class="banner-list">
                    @foreach ($newReleases as $book)
                    <div class="col-md-4 col-sm-6">
                        <div class="single-banner">
                            <a href="{{ url("single_book/$book->id") }}">
                                <img style="height:300px; width:100%;" src="{{asset("/storage/$book->image")}}" alt="">
                            </a>
                            <div class="price">
                                <span style="font-size: 20px; color: red;">Tk.{{ $book->price_discount }}</span>
                                @if ($book->discount_amount)
                                    <del style="color: black"> Tk.{{ $book->price }}</del>
                                @endif
                            </div>
                            <div class="banner-bottom text-center">
                                <a href="#">NEW RELEASE ({{ $book->created_at->format('M-Y')}})</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Online Banner Area End -->
    <!-- Shop Info Area Start -->
    <div class="shop-info-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="single-shop-info">
                        <div class="shop-info-icon">
                            <i class="flaticon-transport"></i>
                        </div>
                        <div class="shop-info-content">
                            <h2>FREE SHIPPING</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. </p>
                            <a href="#">READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-shop-info">
                        <div class="shop-info-icon">
                            <i class="flaticon-money"></i>
                        </div>
                        <div class="shop-info-content">
                            <h2>FREE SHIPPING</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. </p>
                            <a href="#">READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 hidden-sm">
                    <div class="single-shop-info">
                        <div class="shop-info-icon">
                            <i class="flaticon-school"></i>
                        </div>
                        <div class="shop-info-content">
                            <h2>FREE SHIPPING</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. </p>
                            <a href="#">READ MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="blog-area section-padding">
         <h2 class="section-title">LATEST BOOK</h2>
         <p>The latest books Library.</p>
         <div class="container">
            <div class="row">
                <div class="blog-list indicator-style">

                    @foreach ($latestBooks as $book)
                    <div class="col-md-3">
                        <div class="single-banner">
                            <div class="product-wrapper">
                                <a href="{{url("/book/$book->id")}}" class="single-banner-image-wrapper">
                                    <img style="height:280px;  width:100%;" src="{{asset("/storage/$book->image")}}">
                                    <div style="text-align: center">
                                        <span style="font-size: 20px; font-weight:bold">Tk.{{ $book->price_discount }}</span>
                                        @if ($book->discount_amount)
                                            <del> Tk.{{ $book->price }}</del>
                                        @endif
                                    </div>

                                </a>
                                <div class="product-description">
                                    <div class="functional-buttons">
                                        <a href="{{url("cart/add/$book->id")}}" title="Add to Cart">
                                            <i class="fa fa-shopping-cart"></i>
                                        </a>

                                        <a href="{{ url("single_book/$book->id") }}" title="Details view">
                                            <i class="fa fa-compress"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="banner-bottom text-center">
                                <a style="color: red" href="#">{{ $book->name }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>


     <div class="blog-area section-padding">
        <h2 class="section-title">SPECIAL BOOK</h2>
        <p>The Specail books Library.</p>
        <div class="container">
            <div class="row">
                <div class="blog-list indicator-style">

                    @foreach ($specialBooks as $book)
                    <div class="col-md-3">
                        <div class="single-banner">
                            <div class="product-wrapper">
                                <a href="{{url("/book/$book->id")}}" class="single-banner-image-wrapper">
                                    <img style="height:280px;  width:100%;" src="{{asset("/storage/$book->image")}}">
                                    <div style="text-align: center">
                                        <span style="font-size: 20px; font-weight:bold">Tk.{{ $book->price_discount }}</span>
                                        @if ($book->discount_amount)
                                            <del> TK.{{ $book->price }}</del>
                                        @endif
                                    </div>

                                </a>
                                <div class="product-description">
                                    <div class="functional-buttons">
                                        <a href="{{url("cart/add/$book->id")}}" title="Add to Cart">
                                            <i class="fa fa-shopping-cart"></i>
                                        </a>

                                        <a href="{{ url("single_book/$book->id") }}" title="Details view">
                                            <i class="fa fa-compress"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="banner-bottom text-center">
                                <a style="color: red" href="#">{{ $book->name }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
     <br><br>
    <!-- Blog Area End -->
    <!-- News Letter Area Start -->
    <div class="newsletter-area text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="newsletter-title">
                        <h2>SUBSCRIBE OUR NEWSLETTER</h2>
                        <p>Subscribe here with your email us and get up to date.</p>
                    </div>
                    <div class="letter-box">
                        <form action="{{ url('subscribe')}}" method="post" class="search-box">
                            @csrf
                            <div>
                                <input type="email" name="email" placeholder="Subscribe us">
                                <button type="submit" class="btn btn-search">SUBSCRIBE<span><i class="flaticon-school-1"></i></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- News Letter Area End -->
@endsection


@push('scripts')
  <script>
       $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
      function searchBook(){
         let searchData=$("#search").val();
         if(searchData.length > 0 ){
            $.ajax({
             data:{'search': searchData},
             url: "/search_book",
             method: 'post',
             success: function(result) {
                 $("#bookSearch").html(result);
             }
          });
        }
        if(searchData.length < 1 ) $("#bookSearch").html("");
     }


     function search_show(){
        $("#bookSearch").slideDown();
     }


     function search_hide(){
        $("#bookSearch").slideUp();
     }
  </script>
@endpush

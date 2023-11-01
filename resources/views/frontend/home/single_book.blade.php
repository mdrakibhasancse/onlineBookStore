@extends('frontend.layouts.app')
@section('title','single')
@section('content')
        <div class="breadcrumbs-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
					    <div class="breadcrumbs">
					       <h2>SINGLE PRODUCT DETAILS</h2>
					       <ul class="breadcrumbs-list">
						        <li>
						            <a title="Return to Home" href="{{ url("/")}}">Home</a>
						        </li>
						        <li>Product Details</li>
						    </ul>
					    </div>
					</div>
				</div>
			</div>
		</div>
		<!-- Breadcrumbs Area Start -->
        <!-- Single Product Area Start -->
        <div class="single-product-area section-padding" style="margin-top:30px; ">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7">
                        <div class="single-product-image-inner">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="one">
                                    <a class="venobox" href="{{asset("/frontend/img/single-product/bg-1.jpg")}}" data-gall="gallery" title="">
                                        <img style="width: 570px; height:550px;" src="{{asset("/storage/$single_book->image")}}" alt="">
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6 col-sm-5">
                        <div class="single-product-details">
                            <div class="list-pro-rating">
                                @php
                                    $rating_number = number_format($rating_value)
                                @endphp
                                @for ($i=1; $i<=$rating_number; $i++)
                                 <i class="fa fa-star icolor"></i>
                                @endfor

                                @for ($j=$rating_number+1; $j <= 5; $j++)
                                 <i class="fa fa-star"></i>
                                @endfor
                            </div>

                            <div>
                                @if(count($review_messages) > 0)
                                <span style="font-size:20px;">Total Review : ({{ count($review_messages)}})</span>
                                @else
                                <span style="font-size:20px;">Total Review : (No review)</span>

                                @endif
                            </div>


                            <h2 style="font-size: 20px; margin-top:10px;">Name : {{ $single_book->name }}</h2>
                            <div class="availability" style="font-size:20px;">
                                <span style="margin-top:10px">In Stock :  ({{ $single_book->stock }} Stock Avaiable)</span>
                            </div>


                            <div class="single-product-price">
                                <h2>Price : Tk.{{ $single_book->price_discount }}</h2>
                            </div>

                            <div class="availability">
                                <span style="font-size:20px; font-weight:bold;">ISBN_NO :  ({{ $single_book->ISBN_NO }}) </span>
                            </div>
                            <br>

                           <form action="{{ url("/cart/add")}}" method="post">
                            @csrf
                            <div class="product-attributes clearfix">

                                <span class="pull-left" id="quantity-wanted-p">
									<span class="dec qtybutton">-</span>
									<input type="text" name="quantity" value="1"  class="cart-plus-minus-box">
									<span class="inc qtybutton">+</span>
								</span>

                                <span>
                                <span> <input type="hidden" name="product_id" value="{{$single_book->id}}"></span>
                               <span>
                                    <button class="cart-btn btn-default" type="submit">
                                        <i class="flaticon-shop"></i>
                                        Add to cart
                                    </button>
                               </span>
                            </div>
                         </form>
                            <div class="add-to-wishlist">
                                <a class="wish-btn" href="cart.html">
                                    <i class="fa fa-heart-o"></i>
                                    ADD TO WISHLIST
                                </a>
                            </div>
                            <div class="single-product-categories">
                               <label>Category : </label>
                                <span>{{ $single_book->category->name }}</span>
                            </div>
                            {{-- <div class="social-share">
                                <label>Share: </label>
                                <ul class="social-share-icon">
                                    <li><a href="#"><i class="flaticon-social"></i></a></li>
                                    <li><a href="#"><i class="flaticon-social-1"></i></a></li>
                                    <li><a href="#"><i class="flaticon-social-2"></i></a></li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="row">
					<div class="col-md-9">
                        <div class="p-details-tab-content">
                            <div class="p-details-tab">
                                <ul class="p-details-nav-tab" role="tablist">
                                    <li role="presentation" class="active"><a href="#more-info" aria-controls="more-info" role="tab" data-toggle="tab">Description</a></li>
                                    <li role="presentation"><a href="#data" aria-controls="data" role="tab" data-toggle="tab">Specification</a></li>
                                    <li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">Review</a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                            <div class="tab-content review">
                                <div role="tabpanel" class="tab-pane active" id="more-info">
                                    <p>{{ $single_book->description }}</p>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="data">
                                    <table class="table-data-sheet">
                                        <tbody>
                                            <tr class="odd">
                                                <td>Title</td>
                                                <td>{{ $single_book->name }}</td>
                                            </tr>
                                            <tr class="even">
                                                <td>Author</td>
                                                <td>
                                                    @foreach ( $single_book->authors as $author)
                                                          {{ $author->name }},
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr class="odd">
                                                <td>Publisher</td>
                                                <td>{{ $single_book->publisher->name }}</td>
                                            </tr>
                                            <tr class="even">
                                                <td>Page</td>
                                                <td>{{ $single_book->page }}</td>
                                            </tr>

                                            <tr class="even">
                                                <td>ISBN_NO</td>
                                                <td>{{ $single_book->ISBN_NO }}</td>
                                            </tr>

                                            <tr class="odd">
                                                <td>Language</td>
                                                <td>{{ $single_book->language }}</td>
                                            </tr>
                                        </tbody>
                                   </table>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="reviews">
                                    <div id="product-comments-block-tab">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                               <form action="{{ url("review/store") }}" method="POST">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-xs-6">
                                                      <label for="name">Name : </label>
                                                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                                                    </div>
                                                    <div class="col-xs-6">
                                                      <label for="email">Email : </label>
                                                      <input type="eamil" class="form-control" id="email" name="email" placeholder="Enter your Email">
                                                    </div>
                                                </div>

                                                  <div class="form-group row">
                                                    <div class="col-xs-12">
                                                        <label for="message">Rating : </label>
                                                        <select name="rating" id="" class="form-control">
                                                            <option value="">--select rating--</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </div>
                                                  </div>

                                                  <div class="form-group row">
                                                    <div class="col-xs-12">
                                                        <label for="message">Message : </label>
                                                         <textarea name="message" id="message" rows="10" class="form-control"></textarea>
                                                    </div>
                                                  </div>
                                                   <input type="hidden" name="book_id" value="{{$single_book->id}}">
                                                   <button type="submit" class="btn btn-primary">Send</button>
                                               </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
                <br><br>
                 <div class="row">
                       <div class="col-md-12">
                         <h3 class="btn btn-primary">Book Review</h3>
                         <br><br>
                         @foreach ($review_messages as $review)
                             <p>{{ $review->message }}</p>
                         @endforeach
                       </div>
                 </div>
            </div>
        </div>
        <!-- Single Product Area End -->
        <!-- Related Product Area Start -->
        <div class="related-product-area">
            <h2 class="section-title">RELATED BOOKS</h2>
            <div class="container">
                <div class="row">
                    <div class="related-product indicator-style">
                        @foreach ($related_book as  $book)


                        <div class="col-md-3">
                               <div class="single-banner">
                                <div class="product-wrapper">
                                    <a href="#" class="single-banner-image-wrapper">
                                        <img style="height: 270px;  width:100%;" src="{{asset("/storage/$book->image")}}">
                                        <div style="text-align: center">
                                            <span style="font-size: 20px; font-weight:bold">Tk.{{ $book->price_discount }}</span>
                                            @if ($book->discount_amount > 0)
                                                <del> Tk.{{ $book->price }}</del>
                                            @endif
                                        </div>
                                        <div class="rating-icon">
                                            <i class="fa fa-star icolor"></i>
                                            <i class="fa fa-star icolor"></i>
                                            <i class="fa fa-star icolor"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </a>
                                    <div class="product-description">
                                        <div class="functional-buttons">
                                            <div class="functional-buttons">
                                                <a href="{{url("cart/add/$book->id")}}" title="Add to Cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>

                                                <a href="{{ url("single_book/$book->id") }}" title="Quick view">
                                                    <i class="fa fa-compress"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner-bottom text-center">
                                    <a style="color: red"  href="#">{{ $book->name }}</a>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Related Product Area End -->



@endsection


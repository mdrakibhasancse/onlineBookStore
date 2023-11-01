
      <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-6 col-xs-6">
                    <div class="header-logo">
                        <a href="{{ url('/')}}">
                            <img style="height: 40px;" src="{{asset("/frontend/img/book.png")}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 hidden-xs">
                    <div class="mainmenu text-center">
                        <nav>
                            <ul id="nav">
                                <li><a href="{{ url('/')}}">HOME</a></li>
                                <li><a href="{{ url('/featured') }}">featured</a>
                                <li><a href="#">category</a>
                                    <ul class="sub-menu">
                                        @foreach ($categories as $category)
                                          <li><a href="{{ url("category/$category->name")}}">{{ $category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="{{ url("/author") }}">Author</a></li>
                                <li><a href="{{url('/contact')}}">CONTACT</a></li>
                                 @auth
                                 <li><a href="#">Account</a>
                                    <ul class="sub-menu">

                                      @if(Auth::user()->is_admin)
                                       <li><a href="{{ url('/admin/profile') }}">My Profile</a></li>
                                       @else
                                       <li><a href="{{ url('/dashboard') }}">My Profile</a></li>
                                       @endif

                                        <li><a href="{{ url('/cart/order_list')}}">My Order</a></li>
                                        <li>
                                            <form action="{{ route('logout') }}" method="post">
                                                @csrf
                                                 <button class="btn-btn" type="submit"> Logout </button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                 @endauth
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-md-2 hidden-sm">
                    <div class="header-right">
                        <ul>
                           @guest
                             <li>
                                <a href="{{ url('/customer-login')}}">
                                    <button class="btn-style" type="submit"> Sign in </button>
                                </a>
                             </li>
                           @endguest

                            <li class="shoping-cart">
                                <a href="#">
                                    <i class="flaticon-shop" style="font-size:25px"></i>
                                    <span>{{ $cartTotalQuantity }}</span>
                                </a>
                                <div class="add-to-cart-product">
                                    <div class="cart-checkout">
                                        <a href="{{ url("/cart/check_out") }}">
                                            Check out
                                            <i class="fa fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

   	<!-- Mobile Menu Start -->
		<div class="mobile-menu-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="mobile-menu">
							<nav id="dropdown">
								<ul>
                                    <li><a href="{{ url('/')}}">HOME</a></li>
                                    <li><a href="{{ url('/featured') }}">featured</a>
                                    <li><a href="#">category</a>
                                        <ul class="sub-menu">
                                            @foreach ($categories as $category)
                                              <li><a href="{{ url("category/$category->name")}}">{{ $category->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li><a href="{{ url("/author") }}">Author</a></li>
                                    <li><a href="{{url('/contact')}}">CONTACT</a></li>
                                    @auth
                                    <li><a href="#">Account</a>
                                       <ul class="sub-menu">
                                           <li><a href="{{ url('/dashboard')}}">My Profile</a></li>
                                           <li><a href="{{ url('/cart/order_list')}}">My Order</a></li>
                                           <li>
                                            <form action="{{ route('logout') }}" method="post">
                                                @csrf
                                                 <button  type="submit"> Logout </button>
                                            </form>
                                           </li>
                                        </ul>
                                   </li>
                                    @endauth
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Mobile Menu End -->

        <style>

.mainmenu nav ul#nav li ul.sub-menu li button {
    padding: 14px 0px 10px 16px;
}
.mainmenu nav ul#nav li button {
    display: block;
    font-weight: 500;
    margin: 0;
    text-transform: uppercase;
}

button {
    transition: all 0.3s ease 0s;
    text-decoration: none;
    color: #444444;
    background-color: transparent;
    border: none;
}
button:hover {
    color: #32B5F3;
    text-decoration: none;
}
button:active, button:hover {
    outline: 0 none;
}


.mean-container .mean-nav ul li li button {
    border-top: 1px solid rgba(255, 255, 255, 0.25);
    opacity: 0.75;
    padding-top: 8px;
    text-shadow: none !important;
    visibility: visible;
    width: 28%;
    font-weight: normal;
    text-transform: capitalize;
    color: #444;
}

.mean-container .mean-nav ul li li button:hover{
    color: #32B5F3;
}

</style>

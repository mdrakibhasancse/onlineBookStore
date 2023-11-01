<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset("/frontend/img/favicon.ico")}}">
        <!-- Place favicon.ico in the root directory -->
        <!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Poppins:400,700,600,500,300' rel='stylesheet' type='text/css'>

		<!-- all css here -->
		<!-- bootstrap v3.3.6 css -->
        <link rel="stylesheet" href="{{asset("/frontend/css/bootstrap.min.css")}}">
		<!-- animate css -->
        <link rel="stylesheet" href="{{asset("/frontend/css/animate.css")}}">
		<!-- jquery-ui.min css -->
        <link rel="stylesheet" href="{{asset("/frontend/css/jquery-ui.min.css")}}">
		<!-- meanmenu css -->
        <link rel="stylesheet" href="{{asset("/frontend/css/meanmenu.min.css")}}">
		<!-- Font-Awesome css -->
        <link rel="stylesheet" href="{{asset("/frontend/css/font-awesome.min.css")}}">
		<!-- pe-icon-7-stroke css -->
        <link rel="stylesheet" href="{{asset("/frontend/css/pe-icon-7-stroke.css")}}">
		<!-- Flaticon css -->
        <link rel="stylesheet" href="{{asset("/frontend/css/flaticon.css")}}">
		<!-- venobox css -->
        <link rel="stylesheet" href="{{asset("/frontend/venobox/venobox.css")}}" type="text/css" media="screen" />
		<!-- nivo slider css -->
		<link rel="stylesheet" href="{{asset("/frontend/lib/css/nivo-slider.css")}}" type="text/css" />
		<link rel="stylesheet" href="{{asset("/frontend/lib/css/preview.css")}}" type="text/css" media="screen" />
		<!-- owl.carousel css -->
        <link rel="stylesheet" href="{{asset("/frontend/css/owl.carousel.css")}}">
		<!-- style css -->
		<link rel="stylesheet" href="{{asset("/frontend/style.css")}}">
        <link rel="stylesheet" href="{{asset("/frontend/custom.css")}}">
		<!-- responsive css -->
        <link rel="stylesheet" href="{{asset("/frontend/css/responsive.css")}}">
		<!-- modernizr css -->
        <script src="{{asset("/frontend/js/vendor/modernizr-2.8.3.min.js")}}"></script>
        <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    </head>
    <body>

         @include('frontend.layouts.nav')

         @yield('content')

         @include('frontend.layouts.footer')
        <!--End of Quickview Product-->
		<!-- all js here -->
		<!-- jquery latest version -->
        <script src="{{asset("/frontend/js/vendor/jquery-1.12.0.min.js")}}"></script>
		<!-- bootstrap js -->
        <script src="{{asset("/frontend/js/bootstrap.min.js")}}"></script>
		<!-- owl.carousel js -->
        <script src="{{asset("/frontend/js/owl.carousel.min.js")}}"></script>
		<!-- jquery-ui js -->
        <script src="{{asset("/frontend/js/jquery-ui.min.js")}}"></script>
		<!-- jquery Counterup js -->
        <script src="{{asset("/frontend/js/jquery.counterup.min.js")}}"></script>
        <script src="{{asset("/frontend/js/waypoints.min.js")}}"></script>
		<!-- jquery countdown js -->
        <script src="{{asset("/frontend/js/jquery.countdown.min.js")}}"></script>
		<!-- jquery countdown js -->
        <script type="text/javascript" src="{{asset("/frontend/venobox/venobox.min.js")}}"></script>
		<!-- jquery Meanmenu js -->
        <script src="{{asset("/frontend/js/jquery.meanmenu.js")}}"></script>
		<!-- wow js -->
        <script src="{{asset("/frontend/js/wow.min.js")}}"></script>
		<script>
			new WOW().init();
		</script>
		<!-- scrollUp JS -->
        <script src="{{asset("/frontend/js/jquery.scrollUp.min.js")}}"></script>
		<!-- plugins js -->
        <script src="{{asset("/frontend/js/plugins.js")}}"></script>
		<!-- Nivo slider js -->
		<script src="{{asset("/frontend/lib/js/jquery.nivo.slider.js")}}" type="text/javascript"></script>
		<script src="{{asset("/frontend/lib/home.js")}}" type="text/javascript"></script>
		<!-- main js -->
        <script src="{{asset("/frontend/js/main.js")}}"></script>

        <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
        <script>
            @if($errors->any())
               @foreach ($errors->all() as $error)
                  toastr.error('{{$error}}','Error',{
                   closeButton:true,
                   progressBar:true,
                 });
               @endforeach
            @endif
       </script>
    </body>
  @stack('scripts')
</html>

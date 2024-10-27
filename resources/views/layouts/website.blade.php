<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}" />

	<title>@yield('title') | {{ $content->company_name }}</title>
	<link rel="shortcut icon" href="{{ asset($content->logo) }}">

	<!-- fraimwork - css include -->
	<link rel="stylesheet" type="text/css" href="{{asset('website/css/bootstrap.min.css')}}">

	<!-- icon css include -->
	<link rel="stylesheet" type="text/css" href="{{asset('website/css/fontawesome-all.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('website/css/flaticon.css')}}">

	<!-- carousel css include -->
	<link rel="stylesheet" type="text/css" href="{{asset('website/css/slick.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('website/css/slick-theme.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('website/css/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('website/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('website/css/owl.theme.default.min.css')}}">

	<!-- others css include -->
	<link rel="stylesheet" type="text/css" href="{{asset('website/css/magnific-popup.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('website/css/jquery.mCustomScrollbar.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('website/css/calendar.css')}}">

	<!-- color switcher css include -->
	<link rel="stylesheet" type="text/css" href="{{asset('website/css/style-switcher.css')}}">
	<link id="color_theme" rel="stylesheet" type="text/css" href="{{asset('website/css/default.css')}}">

	<!-- custom css include -->
	<link rel="stylesheet" type="text/css" href="{{asset('website/css/style.css')}}">


</head>
<body class="site-body style-v1">
	<!-- Header -->
    @include('partials.website_header')
	<!-- End Header -->

	<!-- Content -->
	  @yield('website-content')

	<!-- Footer Widget-->
  @include('partials.website_footer')
	<!-- End Copyright -->


<!-- fraimwork - jquery include -->
<script src="{{asset('website/js/jquery-3.3.1.min.js')}}"></script>
	<script src="{{asset('website/js/popper.min.js')}}"></script>
	<script src="{{asset('website/js/bootstrap.min.js')}}"></script>

	<!-- carousel jquery include -->
	<script src="{{asset('website/js/slick.min.js')}}"></script>
	<script src="{{asset('website/js/owl.carousel.min.js')}}"></script>

	<!-- map jquery include -->
	<script src="{{asset('website/js/gmap3.min.js')}}"></script>
	<script src="http://maps.google.com/maps/api/js?key=AIzaSyC61_QVqt9LAhwFdlQmsNwi5aUJy9B2SyA"></script>

	<!-- calendar jquery include -->
	<script src="{{asset('website/js/atc.min.js')}}"></script>

	<!-- others jquery include -->
	<script src="{{asset('website/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('website/js/isotope.pkgd.min.js')}}"></script>
	<script src="{{asset('website/js/jarallax.min.js')}}"></script>
	<script src="{{asset('website/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

	<!-- gallery img loaded - jqury include -->
	<script src="{{asset('website/js/imagesloaded.pkgd.min.js')}}"></script>

	<!-- multy count down - jqury include -->
	<script src="{{asset('website/js/jquery.countdown.js')}}"></script>

	<!-- color panal - jqury include -->
	<script src="{{asset('website/js/style-switcher.js')}}"></script>

	<!-- custom jquery include -->
	<script src="{{asset('website/js/custom.js')}}"></script>

	<!-- End script -->

  @stack('website/_js')


</body>
</html>

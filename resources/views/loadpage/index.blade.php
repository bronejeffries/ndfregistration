<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>NDF|</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400%7CSource+Sans+Pro:700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{ asset('charityassets/css/bootstrap.min.css') }}" />

	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="{{ asset('charityassets/css/owl.carousel.css') }}" />
	<link type="text/css" rel="stylesheet" href="{{ asset('charityassets/css/owl.theme.default.css') }}" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{ asset('charityassets/css/font-awesome.min.css') }}">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ asset('charityassets/css/style.css') }}" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<!-- HEADER -->
	<header id="home">
		<!-- NAVGATION -->
		<nav id="main-navbar">
			<div class="container">
				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a class="logo" href="index.html"><img src="{{ asset('assets/images/kisaakateLogo.jpg') }}" alt="logo"></a>
					</div>
					<!-- Logo -->

					<!-- Mobile toggle -->
					<button class="navbar-toggle-btn">
							<i class="fa fa-bars"></i>
						</button>
					<!-- Mobile toggle -->

					<!-- Mobile Search toggle -->
					<button class="search-toggle-btn">
							<i class="fa fa-search"></i>
						</button>
					<!-- Mobile Search toggle -->
				</div>

				<!-- Nav menu -->
				<ul class="navbar-menu nav navbar-nav navbar-right">
                    @guest
                    <li class="has-dropdown"><a href="#">
                            Guest
                        </a>
                            <ul class="dropdown">
                                <li><a href="{{ route('login') }}"> <i class="fa fa-tachometer"></i>Login</a></li>
                            </ul>
                    </li>
                    @else
                    <li class="has-dropdown"><a href="#">
                        {{ Auth::user()->name }}
                        </a>
                            <ul class="dropdown">
                                <li><a href="{{ route('ekns.index') }}"> <i class="fa fa-tachometer"></i> Dashboard View</a></li>
                                <li><a href="#"> <i class="fa fa-sign-out"></i> Logout</a></li>
                            </ul>
                    </li>
                    @endguest

				</ul>
				<!-- Nav menu -->
			</div>
		</nav>
		<!-- /NAVGATION -->
	</header>
	<!-- /HEADER -->

	<!-- EVENTS -->
	<div id="events" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-8 col-md-offset-2">
					<div class="section-title text-center">
						<h2 class="title">Ekisaakaate Kya Nnaabagereka</h2>
						<p class="sub-title text-uppercase "> <strong>"LABA, YIGA, KOLA"</strong></p>
					</div>
				</div>
				<!-- /section title -->


                @foreach ($ekns as $key=>$ekn)
				<!-- event -->
				<div class="col-md-6">
					<div class="event">
						<div class="event-img">
								<img src="{{ asset('assets/images/kisaakateLogo.jpg') }}" alt="">
						</div>
						<div class="event-content">
							<h3><a href="{{ route('ekns.show',[$ekn]) }}">{{ $ekn->name }} {{ $ekn->description }} {{ $ekn->activeyear->name }} </a></h3>
							<ul class="event-meta">
								<li><i class="fa fa-clock-o"></i> {{ Carbon\Carbon::parse($ekn->start_date)->format('d M, Y') }} <strong>|</strong> {{ Carbon\Carbon::parse($ekn->end_date)->format('d M, Y') }}</li>
								<li><i class="fa fa-map-marker"></i><span class="h5">{{ $ekn->venue }}</span></li>
                            </ul>
                            @if ((bool)$ekn->open)
                            <a href="#" class="primary-button" onclick="event.preventDefault();
                                                            document.getElementById('form-{{ $ekn->id }}').submit(); ">
                                          Registration Open
                            </a>
                            <form  id="form-{{ $ekn->id }}" action="{{ route('participants.create') }}" method="get">
                                    <input type="hidden" value="{{ $ekn->id }}" name="ekn_d">
                            </form>
                            @else
                                <p>Registration for Ekisaakate {{ $ekn->description }} {{ $ekn->activeyear->name }} is <span class="font-weight-bold btn btn-danger">Closed</span></p>
                            @endif
						</div>
					</div>
				</div>
				<!-- /event -->
                @endforeach


				<!-- event -->
				{{-- <div class="col-md-6">
					<div class="event">
						<div class="event-img">
								<img src="{{ asset('charityassets/img/event-1.jpg') }}" alt="">
						</div>
						<div class="event-content">
							<h3><a href="single-event.html">Ekisaakate Diaspora 2019</a></h3>
							<ul class="event-meta">
								<li><i class="fa fa-clock-o"></i> 24 October, 2018 | 8:00AM - 11:00PM</li>
								<li><i class="fa fa-map-marker"></i> Hanna International School</li>
							</ul>
                            <p>Registration for Ekisaakate Diaspora 2019 is <span class="h4 font-weight-bold" > <strong>Open</strong></span></p>
                            <a href="#" class="primary-button">Register Now!</a>
						</div>
					</div>
				</div> --}}
				<!-- /event -->

				{{-- <div class="clearfix visible-md visible-lg"></div> --}}

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /EVENTS -->

	<!-- jQuery Plugins -->
	<script src="{{ asset('charityassets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('charityassets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('charityassets/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('charityassets/js/jquery.stellar.min.js') }}"></script>
	<script src="{{ asset('charityassets/js/main.js') }}"></script>

</body>

</html>

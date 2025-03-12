<!doctype html>
<html lang="en">
<head>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Suka Sama Suka">
	<link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">

	<meta name="description" content="Suka Sama Suka - A Healthcare Placement System">
	<meta name="keywords" content="bootstrap, Laravel, healthcare, matching, KKM">

	<!-- CSRF Token (Security) -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Source+Serif+Pro:wght@400;700&display=swap" rel="stylesheet">

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/jquery.fancybox.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/fonts/icomoon/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/fonts/flaticon/font/flaticon.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
@include('layouts.navigation')
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
    <nav class="site-nav">
        <div class="container">
            <div class="site-navigation">
                <a href="{{ route('home') }}" class="logo m-0">Suka Sama Suka</a>
                <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu float-right">
                    <li class="active"><a href="{{ route('home') }}">Home</a></li>
                    <li class="has-children">
                    <li class="has-children">
                         <a href="#">Match List</a>
                         <ul class="dropdown">
                         <li><a href="{{ route('match.sent') }}">Sent Matches</a></li>
                        <li><a href="{{ route('match.received') }}">Received Matches</a></li>
                        </ul>
                    </li>

                    </li>
                    <li><a href="{{ route('myprofile') }}">My Profile</a></li>
                    <li><a href="{{ route('matchlist') }}">Match List</a></li>
                    @auth
                        <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                          </form>

                        </li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                    @endauth
                </ul>
                <a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light" data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
    <div class="py-5 cta-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h2 class="mb-2 text-white">Lets you Explore the Best. Contact Us Now</h2>
                    <p class="mb-4 lead text-white text-white-opacity">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, fugit?</p>
                    <p class="mb-0"><a href="booking.html" class="btn btn-outline-white text-white btn-md font-weight-bold">Get in touch</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="site-footer">
        <div class="inner first">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="widget">
                            <h3 class="heading">About Tour</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="widget">
                            <h3 class="heading">Pages</h3>
                            <ul class="links list-unstyled">
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="widget">
                            <h3 class="heading">Contact</h3>
                            <ul class="list-unstyled quick-info links">
                                <li class="email"><a href="#">mail@example.com</a></li>
                                <li class="phone"><a href="#">+1 222 212 3819</a></li>
                                <li class="address"><a href="#">43 Raymouth Rd. Baltemoer, London 3910</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')  <!-- Include footer -->

	<!-- JavaScript Files -->
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.fancybox.min.js') }}"></script>
	<script src="{{ asset('assets/js/aos.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
</html>

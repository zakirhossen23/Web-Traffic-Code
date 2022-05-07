<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{$site->site_name}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="{{$site->site_description}}" />
	<meta name="keywords" content="" />
	<meta name="author" content="bluecoder.co" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-md-2">
							<div id="colorlib-logo"><a href="">Surfy</a></div>
						</div>
						<div class="col-md-10 text-right menu-1">
							<ul>
								<li class="active"><a href="/">Home</a></li>
								@if (Auth::guest())
								<li><a href="#features">Features</a></li>
								<li><a href="{{ url('/login') }}">Login</a></li>
                        		<li><a href="{{ url('/register') }}">Register</a></li>
								@else
								<li><a href="#features">Features</a></li>
								<li><a href="{{ url('/logout') }}">LogOut</a></li>
								<li><a href="{{ url('/dashboard') }}">Dashboard <i class="icon-arrow-right2"></i></a></li>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<section id="home" class="video-hero" data-section="home">
		<div class="overlay"></div>
			<div class="display-t text-center">
				<div class="display-tc">
					<div class="container">
						<div class="col-md-12 col-md-offset-0">
							<div class="animate-box">
								<h2>Surfy - Laravel Traffic Exchange</h2>
								<p>Free traffic exchange service built to help you increase your traffic</p>
								<p><a href="{{ url('/register') }}" class="btn btn-primary btn-lg btn-custom"> Sign Up <b>FREE</b></a></p>
								<p style="font-size: 16px;">Sign up now and get 100 traffic credits for <b>FREE!</b></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<div class="colorlib-featured">
			<div class="row animate-box">
				<div class="featured-wrap">
					<div class="owl-carousel">
						<div class="item">
							<div class="col-md-8 col-md-offset-2">
								<div class="featured-entry">
									<img class="img-responsive" src="images/dashboard_full_1.png" alt="">
								</div>
							</div>
						</div>
						<div class="item">
							<div class="col-md-8 col-md-offset-2">
								<div class="featured-entry">
									<img class="img-responsive" src="images/dashboard_full_2.png" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="colorlib-services colorlib-bg-white" id="features">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
						<h2>Features</h2>
						<p>Powerful features to help you rank your website</p>
					</div>
					<div class="col-md-4 text-center animate-box">
						<div class="services">
							<span class="icon">
								<i class="icon-time"></i>
							</span>
							<div class="desc">
								<h3>Instant website validation</h3>
								<p>Once a website is successfully added it will instantly be validated and receive unlimited traffic.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 text-center animate-box">
						<div class="services">
							<span class="icon">
								<i class="icon-browser"></i>
							</span>
							<div class="desc">
								<h3>Works on all browsers</h3>
								<p>All you need is a standard web browser with free Alexa extension for Chrome or Firefox.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 text-center animate-box">
						<div class="services">
							<span class="icon">
								<i class="icon-refresh"></i>
							</span>
							<div class="desc">
								<h3>Surfing on Auto-pilot</h3>
								<p>Surfing is 100% autopilot. We will never ask you to enter any verification or captcha code to continue surfing.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 text-center animate-box">
						<div class="services">
							<span class="icon">
								<i class="icon-wallet"></i>
							</span>
							<div class="desc">
								<h3>Earn Credits</h3>
								<p>Earn credits by using our Auto Surf page, visit other members websites in return your website gets viewed.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 text-center animate-box">
						<div class="services">
							<span class="icon">
								<i class="icon-graph"></i>
							</span>
							<div class="desc">
								<h3>Scalable Results</h3>
								<p>You could expect to see a marked increase in your website ranking within the first week or less.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 text-center animate-box">
						<div class="services">
							<span class="icon">
								<i class="icon-lifebuoy"></i>
							</span>
							<div class="desc">
								<h3>24 HOUR SUPPORT</h3>
								<p>We have set up a support team that is available 24 hours a day to answer any questions you have about our services.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="colorlib-counter" class="colorlib-counters" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-4 col-sm-4 text-center animate-box">
							<div class="counter-entry">
								<span class="icon"><i class="flaticon-ribbon"></i></span>
								<div class="desc">
									<span class="colorlib-counter js-counter" data-from="0" data-to="2019" data-speed="5000" data-refresh-interval="100"></span>
									<span class="colorlib-counter-label">Operating since</span>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 text-center animate-box">
							<div class="counter-entry">
								<span class="icon"><i class="flaticon-church"></i></span>
								<div class="desc">
									<span class="colorlib-counter js-counter" data-from="0" data-to="{{ $hits_exchanged }}" data-speed="5000" data-refresh-interval="50"></span>
									<span class="colorlib-counter-label">Hits exchanged</span>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 text-center animate-box">
							<div class="counter-entry">
								<span class="icon"><i class="flaticon-dove"></i></span>
								<div class="desc">
									<span class="colorlib-counter js-counter" data-from="0" data-to="{{ $registered_users }}" data-speed="5000" data-refresh-interval="50"></span>
									<span class="colorlib-counter-label">Registered Members</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="colorlib-work-featured colorlib-bg-white" id="How-it-works">
			<div class="container">
				<div class="row mobile-wrap">
					<div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
						<h2>How does it work?</h2>
						<p>The easiest way to increase your website traffic</p>
					</div>
					<div class="col-md-7 animate-box">
						<!--<div class="mobile-imgs" style="background-image: url(images/add-website.png);"></div>-->
						<img src="/images/add-website.png" class="img-responsive mobile-img" />
					</div>
					<div class="col-md-5 animate-box">
						<div class="desc">
							<h2>Add your website</h2>
							<div class="features">
								<span class="icon"><i class="icon-lightbulb"></i></span>
								<div class="f-desc">
									<p>Add your website URL, title and the number of credits you would like to give for each visit. after you specify all the traffic properties you need, your website is instantly put into the system and ready to get traffic.</p>
								</div>
							</div>
							<p><a href="{{ url('/websites') }}" class="btn btn-primary btn-outline with-arrow">Learn More <i class="icon-arrow-right3"></i></a></p>
						</div>
					</div>
				</div>
				<div class="row mobile-wrap">
					<div class="col-md-7 col-md-push-5 animate-box">
						<!--<div class="mobile-imgs" style="background-image: url(images/earn-credits.png);"></div>-->
						<img src="/images/earn-credits.png" class="img-responsive mobile-img" />
					</div>
					<div class="col-md-5 col-md-pull-7 animate-box">
						<div class="desc">
							<h2>Earn free credits</h2>
							<div class="features">
								<span class="icon"><i class="icon-lightbulb"></i></span>
								<div class="f-desc">
									<p>Launch Autosurf system and earn credits by using our surf page. Your browser will automatically visit other websites for you and you will earn credits as long as you run it. You can also purchase credits.</p>
								</div>
							</div>
							<p><a href="{{ url('/surf') }}" class="btn btn-primary btn-outline with-arrow">Learn More <i class="icon-arrow-right3"></i></a></p>
						</div>
					</div>
				</div>
				<div class="row mobile-wrap">
				<div class="col-md-7 animate-box">
						<!--<div class="mobile-imgs" style="background-image: url(images/traffic-analytics.png);"></div>-->
						<img src="/images/traffic-analytics.png" class="img-responsive mobile-img" />
					</div>
					<div class="col-md-5 animate-box">
						<div class="desc">
							<h2>Receive traffic</h2>
							<div class="features">
								<span class="icon"><i class="icon-lightbulb"></i></span>
								<div class="f-desc">
									<p>Done! Your website is getting traffic, as long as your website's active and you have credits remaining in your account balance. You can add more websites to maximize your traffic.</p>
								</div>
							</div>
							<p><a href="{{ url('/dashboard') }}" class="btn btn-primary btn-outline with-arrow">Learn More <i class="icon-arrow-right3"></i></a></p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="colorlib-subscribe" class="colorlib-subscribe" style="background-image: url(images/cover_img_1.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center text-uppercase colorlib-heading animate-box">
						<h2>Sign Up For Free Website Traffic Today !</h2>
					</div>
				</div>
				<div class="row animate-box">
					<div class="col-md-6  text-center col-md-offset-3">
						<p><a href="{{ url('/register') }}" class="btn btn-primary btn-lg btn-custom text-uppercase">Sign Up For FREE</a></p>
					</div>
				</div>
			</div>
		</div>

		<footer id="colorlib-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-3 colorlib-widget">
						<h4 class="f-logo" style="font-size:31px;">SURFY</h4>
						<p>An Awesome Traffic Exchange System</p>
						<p>
							<ul class="colorlib-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin2"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</p>
					</div>
					<div class="col-md-3 colorlib-widget">
						<h4>Useful Links</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="/"><i class="icon-check"></i> Home</a></li>
								<li><a href="#How-it-works"><i class="icon-check"></i> How it works</a></li>
							</ul>
						</p>
					</div>

					<div class="col-md-3 colorlib-widget">
						<h4>Help</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="{{ url('/contact') }}"><i class="icon-check"></i> Contact us</a></li>
								<li><a href="{{ url('/faq') }}"><i class="icon-check"></i> FAQs</a></li>
							</ul>
						</p>
					</div>

					<div class="col-md-3 colorlib-widget">
						<h4>Contact Us</h4>
						<ul class="colorlib-footer-links">
							<li>291 South 21th Street, <br> Suite 721 New York NY 10016</li>
							<li><a href="tel://1234567920"><i class="icon-phone"></i> + 1235 2355 98</a></li>
							<li><a href="mailto:info@yoursite.com"><i class="icon-envelope"></i> info@yoursite.com</a></li>
							<li><a href="#"><i class="icon-location4"></i> yourwebsite.com</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="copy">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<p>
Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved.<br> 
							</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- YTPlayer -->
	<script src="js/jquery.mb.YTPlayer.min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Counters -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	@yield('extra_js')
	
	</body>

</html>


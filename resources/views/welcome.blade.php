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
	
	
	<!-- Tailwind css style  -->
	<script src="https://cdn.tailwindcss.com"></script>

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
						<div class="col-md-4">
							<div id="colorlib-logo"><a href="">WEB TRAFFIC EXCHANGER</a></div>
						</div>
						<div class="col-md-8 text-right menu-1">
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
								<p>The most effective strategy to increase website visitors. Use the world's most trusted web traffic exchanger service to improve your rankings.</p>
								<p><a href="{{ url('/register') }}" class="btn btn-primary btn-lg btn-custom"> Sign Up <b>FREE</b></a></p>
								<p style="font-size: 16px;">Sign up now and receive 100 free traffic credits!</p>
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
				<div class="row flex flex-wrap">
					<div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
						<h2>Features</h2>
						<p>Our tools assist you in attracting high-quality, relevant visitors to your website.</p>
					</div>
					<div class="col-md-4 text-center animate-box">
						<div class="services">
							<span class="icon">
								<i class="icon-time"></i>
							</span>
							<div class="desc">
								<h3>Validation of websites in real-time</h3>
								<p>A simple check of your websites, pleasurable web traffic, and ongoing monitoring to remove any blocking websites.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 text-center animate-box">
						<div class="services">
							<span class="icon">
								<i class="icon-refresh"></i>
							</span>
							<div class="desc">
								<h3>SIMPLE AND SMART</h3>
								<p>Web traffic exchanger is an application that is both Windows and Linux compatible. SMART NOTIFICATIONS: You get notified when your points/minutes go below a specific threshold. This is useful for maintaining the consistency of your website hits.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 text-center animate-box">
						<div class="services">
							<span class="icon">
								<i class="icon-wallet"></i>
							</span>
							<div class="desc">
								<h3>Scalable Outcomes</h3>
								<p>Actual individuals equal real website traffic. Choose how many hits per day you want, and within the first week or less, you will see a significant rise in your website's rating.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 text-center animate-box">
						<div class="services">
							<span class="icon">
								<i class="icon-lifebuoy"></i>
							</span>
							<div class="desc">
								<h3>24/7 assistance</h3>
								<p>Our purpose is to be ready to assist and fulfill your needs whenever they arise. Our customer service representatives are accessible 24 hours a day to answer any queries you may have about our services.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 text-center animate-box">
						<div class="services">
							<span class="icon">
								<i class="icon-graph"></i>
							</span>
							<div class="desc">
								<h3>BOUNCE RATES ARE LOWER</h3>
								<p>You can set the percentage of visitors who should navigate to another page on your site or click a link on that page. This reduces bounce rates, which are an important factor in determining the quality of traffic in algorithms.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 text-center animate-box">
						<div class="services">
							<span class="icon">
								<i class="icon-browser"></i>
							</span>
							<div class="desc">
								<h3>WHITE LABEL TRAFFIC</h3>
								<p>You are opportune to select where your traffic comes from, Google, Facebook, Instagram, Twitter, or Pinterest. Or perhaps you want to create your own targeted traffic? You make the decision!</p>
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
						<h2>How Web Traffic Exchanger Works?</h2>
						<p>Here's a quick rundown of how web traffic exchanger works.</p>
					</div>

					<div class="col-md-7 animate-box">
						<!--<div class="mobile-imgs" style="background-image: url(images/add-website.png);"></div>-->
						<img src="/images/create-account.png" class="img-responsive mobile-img" />
					</div>
					<div class="col-md-5 animate-box">
						<div class="desc">
							<h2>Create an account for free.</h2>
							<div class="features">
								<span class="icon"><i class="icon-lightbulb"></i></span>
								<div class="f-desc">
									<p>To get started, create a free account. It's simple and quick. We only require your selected username, password, and a valid e-mail address. After joining up, you'll be taken to our dashboard, where you view our amazing features!</p>
								</div>
							</div>
							<p><a href="{{ url('/websites') }}" class="btn btn-primary btn-outline with-arrow">Learn More <i class="icon-arrow-right3"></i></a></p>
						</div>
					</div>
				</div>
					<div class="col-md-7 animate-box">
						<!--<div class="mobile-imgs" style="background-image: url(images/add-website.png);"></div>-->
						<img src="/images/add-website.png" class="img-responsive mobile-img" />
					</div>
					<div class="col-md-5 animate-box">
						<div class="desc">
							<h2>Add your web addresses</h2>
							<div class="features">
								<span class="icon"><i class="icon-lightbulb"></i></span>
								<div class="f-desc">
									<p>Add the URLs of the web pages you want to receive hits to our network and configure the visit duration, maximum hits per hour, and other traffic attributes you require. And your website will be automatically added to the system and ready to receive traffic.</p>
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
							<h2>Obtain complimentary credits</h2>
							<div class="features">
								<span class="icon"><i class="icon-lightbulb"></i></span>
								<div class="f-desc">
									<p>Download the web traffic exchanger application for your operating system. Open up the exchanger and earn points for each page you visit on our network!</p>
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
							<h2>Relax and enjoy the hits.</h2>
							<div class="features">
								<span class="icon"><i class="icon-lightbulb"></i></span>
								<div class="f-desc">
									<p>You will receive automated web visits on your websites from human traffic as long as your website is live and you have points left in your account. Our dashboard allows you to edit and track all of your activities if you ever need to make changes.</p>
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
						<h3>Where do you need traffic? Let’s gets started</h3>
					</div>
				</div>
				<div class="row animate-box">
					<div class="col-md-6  text-center col-md-offset-3">
						<p><a href="{{ url('/register') }}" class="btn btn-primary btn-lg btn-custom text-uppercase">Sign Up Free</a></p>
					</div>
				</div>
			</div>
		</div>

		<footer id="colorlib-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-3 colorlib-widget">
						<h4 class="f-logo" style="font-size:31px;">WEB TRAFFIC EXCHANGER</h4>
						<p>Your audience is at the corner. Make sure they find you</p>
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
							<li><a href="https://webtraffic.live/"><i class="icon-location4"></i> webtraffic.live</a></li>
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


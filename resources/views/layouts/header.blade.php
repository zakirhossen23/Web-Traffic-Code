<div id="layoutSidenav_nav">
	<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
		<div class="sb-sidenav-menu">
			<div class="nav">
				<a class="nav-link" href="{{ url('/dashboard') }}">
					<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
					Dashboard
				</a>
				<a class="nav-link" href="{{ url('/surf') }}">
					<div class="sb-nav-link-icon"><i class="fas fa-sync-alt"></i></div>
					Earn Credits
				</a>
				<a class="nav-link" href="{{ url('/websites') }}">
					<div class="sb-nav-link-icon"><i class="fas fa-link"></i></div>
					Websites
				</a>
				<a class="nav-link" href="{{ url('/referrals') }}">
					<div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
					Referrals
				</a>
				<a class="nav-link" href="{{ url('/transfer') }}">
					<div class="sb-nav-link-icon"><i class="fas fa-paper-plane"></i></div>
					Transfers
				</a>
				<a class="nav-link" href="{{ url('/buy/credits') }}">
					<div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
					Buy Credits
				</a>
				<li class="sidebar-divider my-3"></li>
				<a class="nav-link" href="{{ url('/settings/account') }}">
					<div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
					Settings
				</a>
				<a class="nav-link" href="{{ url('/contact') }}">
					<div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
					Contact Us
				</a>
				<a class="nav-link" href="{{ url('/faq') }}">
					<div class="sb-nav-link-icon"><i class="fas fa-question-circle"></i></div>
					FAQ
				</a>
				<a class="nav-link">
					<select class="form-control" id="exampleFormControlSelect1">
						<option value="en">English</option>
					</select>
				</a>
			</div>
		</div>
	</nav>
</div>
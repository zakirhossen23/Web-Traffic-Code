<div id="layoutSidenav_nav">
	<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
		<div class="sb-sidenav-menu">
			<div class="nav">
				<div class="sb-sidenav-menu-heading">NAVIGATION</div>
				<a class="nav-link" href="{{ url('/admin') }}">
					<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
					Dashboard
				</a>
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
					<div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
					Users
					<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
				</a>
				<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
					<nav class="sb-sidenav-menu-nested nav">
						<a class="nav-link" href="{{ url('/admin/users') }}">Users List</a>
						<a class="nav-link" href="{{ url('/admin/users/add') }}">Add User</a>
					</nav>
				</div>

				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
					<div class="sb-nav-link-icon"><i class="fas fa-link"></i></div>
					Websites
					<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
				</a>
				<div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
					<nav class="sb-sidenav-menu-nested nav">
						<a class="nav-link" href="{{ url('/admin/websites') }}">Websites List</a>
						<a class="nav-link" href="{{ url('/admin/websites/addwebsite') }}">Add Website</a>
					</nav>
				</div>

				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts3">
					<div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
					Packages
					<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
				</a>
				<div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
					<nav class="sb-sidenav-menu-nested nav">
						<a class="nav-link" href="{{ url('/admin/credits') }}">Packages List</a>
						<a class="nav-link" href="{{ url('/admin/credits/addpack') }}">Add Package</a>
					</nav>
				</div>

				<a class="nav-link" href="{{ url('/admin/transfers') }}">
					<div class="sb-nav-link-icon"><i class="fas fa-paper-plane"></i></div>
					Transfers
				</a>

				<a class="nav-link" href="{{ url('/admin/sales') }}">
					<div class="sb-nav-link-icon"><i class="fas fa-wallet"></i></div>
					Sales
				</a>

				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts4" aria-expanded="false" aria-controls="collapseLayouts4">
					<div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
					System
					<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
				</a>
				<div class="collapse" id="collapseLayouts4" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
					<nav class="sb-sidenav-menu-nested nav">
						<a class="nav-link" href="{{ url('/admin/settings') }}">Settings</a>
					</nav>
				</div>

				<a class="nav-link" href="{{ url('/logout') }}">
					<div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
					Logout
				</a>
			</div>
		</div>
	</nav>
</div>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="{{$site->site_description}}" />
        <meta name="author" content="bluecoder.co" />
        <title>@yield('title')</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="{{ asset('js/jquery.min.js') }}" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <style>
        .invalid-feedback {
            display: block;
        }
        </style>
         <style>
  body {
    background-color: #EEE;
  }

  .loadingDiv {
    display: none;
    text-align: center;
  }

  .noUi-handle {
    -webkit-transform: none !important;
    transform: none !important;
  }

  .noUi-horizontal .noUi-tooltip {
    bottom: -145% !important;
  }

  .noUi-connect {
    background: #17a2b8 !important;
  }

  #dashboard-navbar {
    height: 3rem;
  }

  #dashboard-navbar .nav-link {
    color: white;
  }

  .sidebar-divider {
    width: 100%;
    height: 1px;
    background-color: #999999;
  }

  #content {
    margin-top: 4rem;
  }

  #sidebar a {
    color: white;
  }

  #sidebar a:hover {
    color: #999999;
  }

  #sidebar a.active {
    background-color: black;
    color: #999999;
  }

  .card-columns {
    column-count: 1;
  }

  @media(min-width:992px) {
    .card-columns {
      column-count: 2;
    }
  }

  @media(min-width:1200px) {
    .card-columns {
      column-count: 3;
    }
  }
  </style>
    </head>
    <body class="sb-nav-fixed">

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ url('/dashboard') }}">SurfyApp</a>
			<ul class="navbar-nav mx-auto">
				<li class="nav-item text-white">
				  <span class="credits">{{ Auth::user()->credits }}</span>
				  <span>credits</span>
				</li>
			</ul>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        @if(Auth::user()->userlevel == 1)
                            <a  class="dropdown-item" href="{{ url('/admin') }}">Admin Panel</a>
                        @endif   
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('/settings/account') }}">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('/logout') }}">Sign Out</a>
                    </div>
                </li>
            </ul>
        </nav>
    <div id="layoutSidenav">

        @include('layouts.header')

        @yield('content')

        @include('layouts.footer')
        
    </div>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts.js')}}"></script>
    
    <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/demo/datatables-demo.js') }}"></script>

    @yield('extra_js')
</body>
</html>

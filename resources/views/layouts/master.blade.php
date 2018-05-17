<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<!-- Favicons -->
		<link rel="apple-touch-icon" href="{{ asset('img/apple-icon.png') }}">
		<link rel="icon" href="{{ asset('img/favicon.png') }}">
		
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		
		<title>@yield('title', config('app.name'))</title>
		
		<!--     Fonts and icons     -->
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
		<link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
	
		<!-- Material Dashboard CSS -->
		<link rel="stylesheet" href="{{ asset('css/material-dashboard.min.css') }}">
		@yield('styles')
	</head>
	<body class="@yield('body-class')">
		<div class="wrapper">
			@include('layouts.includes.sidebar')
			
			<div class="main-panel">
				@include('layouts.includes.navbar')
				
				<div class="content">
					<div class="container-fluid">
						<div class="row">
							@include('flash::message')

							@yield('content')
						</div>
					</div>
				</div>
				
				@include('layouts.includes.footer')
			</div>
		</div>
		
		<!--   Core JS Files   -->
		<script src="{{ asset('js/core/jquery.min.js') }}"></script>
		<script src="{{ asset('js/core/popper.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap-material-design.min.js') }}"></script>
		<!-- Material Dashboard Core initialisations of plugins and Bootstrap Material Design Library -->
		<script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
		<!-- Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
		<script src="{{ asset('js/plugins/chartist.min.js') }}"></script>
		<!-- Library for adding dinamically elements -->
		<script src="{{ asset('js/plugins/arrive.min.js') }}"></script>
		<!-- Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/ -->
		<script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
		<!-- Material Dashboard Core initialisations of plugins and Bootstrap Material Design Library -->
		<script src="{{ asset('js/bootstrap-material-design.min.js?v=2.0.0') }}"></script>
		<!-- Demo init -->
		<script src="{{ asset('js/plugins/demo.js') }}"></script>

		<script>
      $('div.alert').not('.alert-important').delay(3000).slideUp(300);
      <!-- This is only necessary if you do Flash::overlay('...') -->
      $('#flash-overlay-modal').modal();
    </script>
		
		@yield('scripts')
	</body>
</html>
<!doctype html>
<html lang="en">

<head>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>IEEE-sha | Dashboard</title>

	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="{{ asset( 'admin/css/bootstrap.css' ) }}">
	<!-- Style CSS -->
	<link rel="stylesheet" href="{{ asset( 'admin/css/style.css' ) }}">
	<!-- FontAwesome CSS-->
	<link rel="stylesheet" href="{{ asset( 'admin/css/fontawesome6.1.1/css/all.css' ) }}">
	<!-- Boxicons CSS-->
	<link rel="stylesheet" href="{{ asset( 'admin/css/boxicons/css/boxicons.min.css' ) }}">
	<!-- Apexcharts  CSS -->
	<link rel="stylesheet" href="{{ asset( 'admin/css/apexcharts.css' ) }}">
</head>

<body>

		<!--Content Start-->
	<div class="content-start transition">
		<div class="container-fluid dashboard">


			<!--Start Topbar -->

			@include('admin.layouts.topbar')

			<!--End Topbar -->
			
			<!--Start Sidebar-->
			
			@include('admin.layouts.sidebar')

			<!-- End Sidebar-->

			<div class="sidebar-overlay"></div>

			@yield('admin_content')

			<!-- Start Footer -->
			@include('admin.layouts.footer')
			<!-- End Footer -->
	
		</div>
	</div>


    <!-- Preloader -->
	<div class="loader">
		<div class="spinner-border text-light" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>

	<!-- Loader -->
	<div class="loader-overlay"></div>

	<!-- General JS Scripts -->
	<script src="{{ asset( 'admin/js/atrana.js' ) }}"></script>

	<!-- JS Libraies -->
	<script src="{{ asset( 'admin/js/jquery.min.js' ) }}"></script>
	<script src="{{ asset( 'admin/js/bootstrap.bundle.min.js' ) }}"></script>
	<script src="{{ asset( 'admin/js/popper.min.js' ) }}"></script>

	<!-- Template JS File -->
	<script src="{{ asset( 'admin/js/script.js' ) }}"></script>
	<script src="{{ asset( 'admin/js/custom.js' ) }}"></script>
</body>

</html>
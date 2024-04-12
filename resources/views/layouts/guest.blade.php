<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.css') }}">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
        <!-- Boostrap Icon-->
        <link rel="stylesheet" href="{{ asset('admin/css/bootstrap-icons/bootstrap-icons.css') }}">
    </head>
    <body>


        @yield("admin_login")


	<!-- General JS Scripts -->
	<script src="{{ asset('admin/js/atrana.js') }}"></script>

	<!-- JS Libraies -->
	<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
	<script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('admin/js/popper.min.js') }}"></script>

    <!-- Template JS File -->
	<script src="{{ asset('admin/js/script.js') }}"></script>
	<script src="{{ asset('admin/js/custom.js') }}custom.js"></script>
 </body>
</html>

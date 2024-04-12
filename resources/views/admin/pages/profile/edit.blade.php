@extends("admin.layouts.layout")
@section("admin_content")

    
	<!--Content Start-->
	<div class="content-start transition">
		<div class="container-fluid dashboard">
			<div class="content-header">
				<h4>Hi, {{ auth()->user()->name }}!</h4>
				<p>Change information about yourself on this page</p>
			</div>

			
            @include('admin.pages.profile.partials.update-profile-information-form')

            @include('admin.pages.profile.partials.update-password-form')

            @include('admin.pages.profile.partials.delete-user-form')
		</div>
	</div>


	</div> <!-- End Container -->
	</div><!-- End Content -->

@endsection
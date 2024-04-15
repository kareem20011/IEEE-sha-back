@extends("admin.layouts.layout")
@section("admin_content")


			<div class="content-header">
				<h4>Hi, {{ auth()->user()->name }}!</h4>
				<p>Change information about yourself on this page</p>
			</div>
			@if(Session::has('status'))
				<div class="alert alert-success">{{ Session::get('status') }}</div>
			@endif
			
            @include('admin.pages.profile.partials.update-profile-information-form')

            @include('admin.pages.profile.partials.update-password-form')

            @include('admin.pages.profile.partials.delete-user-form')
		

@endsection
@extends('layouts.guest')
@section('admin_login')
<div id="error">
    <div class="container text-center">
    <div class="pt-8">
        <h1 class="errors-titles">403</h1>
        <p>Sorry you are not authorized to access the website</p>
        <a href="/" class="text-blue btn btn-primary">Back to page</a>
        </div>
    </div>
</div>
@endsection
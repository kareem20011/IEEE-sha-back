@extends('website.layouts.layout')
@section('header')

<div class="header-content p-lg-5 p-sm-2">
    <h1>About | Page</h1>
</div>

@endsection
@section('website_content')


<!-- Features Starts Here -->
<div class="features-section">
    <div class="container">
        <div class="row">
        <div class="col-md-12">
            <div class="section-heading mb-5">
                <span>Let's talk</span>
                <h2>About Us</h2>
            </div>
        </div>
        <div class="col-md-6">
            <div class="feature-item">
                <div class="icon">
                    <i class="fa-solid fa-person-circle-exclamation"></i>
                </div>
                <div>
                    <h4>Mission</h4>
                    <p>{{ $about->mission }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="feature-item">
                <div class="icon">
                    <i class="fa-solid fa-eye-low-vision"></i>
                </div>
                <div>
                    <h4>Vision</h4>
                    <p>{{ $about->vision }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="feature-item">
                <div class="icon">
                    <i class="fa-solid fa-bullseye"></i>
                </div>
                <div>
                    <h4>Value</h4>
                    <p>{{ $about->value }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="feature-item">
                <div class="icon">
                    <i class="fa-solid fa-address-card"></i>
                </div>
                <div>
                    <h4>Who are we</h4>
                    <p>{{ $about->about_us }}</p>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<!-- Features Ends Here -->


@endsection
@extends('website.layouts.layout')
@section('header')

<div class="header-content p-lg-5 p-3">

    <div class="text">
    <h3>For Better Future</h3>
    <h1>IEEE Shorouk <br> Branch</h1>
    </div>

    <div class="img mb-5">
    <img src="{{ asset( 'temp/images/img1.png' ) }}" alt="">
    </div>

</div>

@endsection
@section('website_content')



<!-- Start who are we -->

<section class="haw-waves p-lg-5 p-2">
    <div class="p-lg-5 p-sm-2">
        <div class="header-section2">
            <h1 data-aos="fade-up" class="head">Hi, How Can We Help You?</h1>
            <p data-aos="fade-right" class="pragraph-head">{{ $about->about_us }}</p>
            <button data-aos="fade-left" class="btn-head"><a href="{{ route('about.index') }}">Learn More <i class="fa-solid fa-arrow-right"></i></a></button>
        </div>
        <div class="wave wave1"></div>
        <div class="wave wave2"></div>
        <div class="wave wave3"></div>
        <div class="wave wave4"></div>
    </div>
</section>

<!-- End who are we -->




<!-- Services Starts Here -->
<div data-aos="fade-up" class="services-section">
    <div class="container">
        <div class="row">
        <div class="col-md-12">
            <div class="section-heading">
                <h2>Services we provide</h2>
                <span>Workshops</span>
            </div>
        </div>
        @foreach($recentWorkshops as $recentWorkshop)
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="service-item">
                @if($recentWorkshop->hasMedia('images'))
                    <img class="card-images" src="{{ $recentWorkshop->getFirstMediaUrl('images') }}" alt="">
                @endif
                <h4>{{ $recentWorkshop->title }}</h4>
                <p>{{ $recentWorkshop->description }}</p>
                <span>{{ $recentWorkshop->category->title }}</span>
            </div>
        </div>
        @endforeach
    </div>
    <a href="{{ route('workshops.index') }}" class="btn btn-theme mb-3">Show more <i class="fa-solid fa-arrow-right"></i></a>
    </div>
</div>
<!-- Services Ends Here -->





<!-- Events Starts Here -->
<div data-aos="fade-up" class="services-section">
    <div class="container">
        <div class="row">
        <div class="col-md-12">
            <div class="section-heading">
                <h2>Our Events</h2>
                <span>Join Us For...</span>
            </div>
        </div>
        @foreach($recentEvents as $recentEvent)
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="service-item">
                @if($recentEvent->hasMedia('images'))
                    <img class="card-images" src="{{ $recentEvent->getFirstMediaUrl('images') }}" alt="">
                @endif
                <h4>{{ $recentEvent->title }}</h4>
                <p>{{ $recentEvent->description }}</p>
                @if (\Carbon\Carbon::parse($recentEvent->expiry_date)->isPast())
                    <p class="text-danger">Event has expired!</p>
                @else
                    <p class="text-success">{{ $recentEvent->expiry_date }}</p>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    <a href="{{ route('events.index') }}" class="btn btn-theme mb-3">Show more <i class="fa-solid fa-arrow-right"></i></a>
    </div>
</div>
<!-- Events Ends Here -->






@endsection
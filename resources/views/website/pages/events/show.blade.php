@extends('website.layouts.layout')
@section('header')

<div class="header-content p-lg-5 p-sm-2">
    <h1>{{ $event->title }}</h1>
</div>

@endsection
@section('website_content')


<!-- <div class="m-5 d-flex justify-content-center align-items-center">
<div class="card" style="width: 18rem;">
    @if($event->hasMedia('images'))
        <img class="card-img-top" src="{{ $event->getFirstMediaUrl('images') }}" alt="Card image cap">
    @endif
  <div class="card-body">
    <h5 class="card-title">{{ $event->title }}</h5>
    <p class="card-text">{{ $event->description }}</p>
    <form action="{{ route( 'booking.store' ) }}">
        <input type="hidden" name="id" value="{{ $event->id }}">
        <button class="btn btn-theme">Book</button>
    </form>
  </div>
</div>
</div> -->
<!-- About Us Starts Here -->
<div class="about-us">
    <div class="container">
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-6">
                <div class="left-image">
                    @if($event->hasMedia('images'))
                        <img src="{{ $event->getFirstMediaUrl('images') }}" alt="Card image cap">
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="right-content">
                    <div class="section-heading">
                        <h2>{{ $event->title }}</h2>
                        <p>{{ $event->description }}</p>
                        @if (\Carbon\Carbon::parse($event->expiry_date)->isPast())
                            <p class="text-danger">Event has expired!</p>
                        @else
                            <span>{{ $event->expiry_date }}</span>
                        @endif
                    </div>
                    @if(\Carbon\Carbon::parse($event->expiry_date)->isPast())
                    <p class="text-danger">can't book!</p>
                    @elseif($hasBooked->isEmpty())
                    <form method="post" action="{{ route( 'booking.store' ) }}">
                        @csrf
                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                        <button class="btn btn-theme">Book</button>
                    </form>
                    @else
                    <form method="post" action="{{ route( 'booking.destroy', $event->id ) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Cancel</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- About Us Ends Here -->


@endsection
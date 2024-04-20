@extends('website.layouts.layout')
@section('header')

<div class="header-content p-lg-5 p-sm-2">
    <h1>Events | Page</h1>
</div>

@endsection
@section('website_content')


<!-- Start Events -->
<div class="events p-5">
    <div class="s-container">
        <div class="main-heading">
            <h2>Events Section</h2>
        </div>
        <div class="d-flex justify-content-center flex-wrap">
            @if(count($events) < 1)
            <h1>No items</h1>
            @else

            @foreach($events as $event)

                <div class="card m-3" style="width: 20rem;">
                    @if($event->hasMedia('images'))
                        <img src="{{ $event->getFirstMediaUrl('images') }}" class="card-img-top" alt="...">
                    @else
                        <p class="w-100 h-100 text-center">No image found</p>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text my-3">{{ $event->description }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-danger">
                                @if (\Carbon\Carbon::parse($event->expiry_date)->isPast())
                                    <p class="text-danger h6">Event has expired!</p>
                                @else
                                    <p class="text-success h6">{{ $event->expiry_date }}</p>
                                @endif
                            </span>
                            <a href="{{ route( 'events.show', $event->id ) }}" class="btn btn-primary">View</a>
                            <!-- <form method="post" action="{{ route( 'booking.store' ) }}">
                                @csrf
                                <input type="hidden" name="event_id" value="{{  $event->id }}">
                                <button class="btn btn-theme {{ \Carbon\Carbon::parse($event->expiry_date)->isPast() ? 'd-none' : 'd-block' }}">Book <i class="fa-solid fa-caret-right"></i></button>
                            </form> -->
                        </div>
                    </div>
                </div>

            @endforeach


            @endif
        </div>
    </div>
</div>
<!-- End Events -->


@endsection
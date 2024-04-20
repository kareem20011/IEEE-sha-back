@extends("admin.layouts.layout")
@section("admin_content")


<div class="row">
    <h2>Books</h2>
    <div class="card w-50 m-auto">
        <div class="card-body">
            @if($event->hasMedia('images'))
                <img width="200" src="{{ $event->getFirstMediaUrl( 'images' ) }}" alt="{{ $event->title }}" class="my-3">
            @endif
            <h3>{{ $event->title }}</h3>
            <p>{{$event->description}}</p>
            @if (\Carbon\Carbon::parse($event->expiry_date)->isPast())
            <p class="text-danger">Event has expired!</p>
            @else
            <p class="text-success">{{ $event->expiry_date }}</p>
            @endif
            <form method="POST" action="{{ route( 'admin.profile.update' ) }}" enctype="multipart/form-data">
                <div class="d-flex justify-content-end">
                    <a href="{{ route( 'admin.events.edit', $event->id ) }}" class="btn btn-info d-flex">Edit</a>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
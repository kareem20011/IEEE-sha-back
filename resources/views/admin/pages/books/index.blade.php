@extends("admin.layouts.layout")
@section("admin_content")

<div class="row">
    <h2>Books</h2>
    <div class="card w-50 m-auto">
        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        @csrf
        @method('patch')
        @foreach($usersWithEvents as $userWithEvent)
        <div class="card-body">
            @if($userWithEvent->hasMedia('images'))
            <img width="200" src="{{ $userWithEvent->getFirstMediaUrl('images') }}" alt="{{ $userWithEvent->name }}" class="my-3">
            @endif
            <h3>{{ $userWithEvent->name }}</h3>
            <p>{{ $userWithEvent->email }}</p>
            <span class="text-dark">Events:</span>
            <ul class="text-dark d-flex flex-wrap justify-content-start align-items-center">
                @foreach($userWithEvent->events as $event)
                    <li><a href="{{ route( 'admin.events.show', $event->id ) }}">{{ $event->title }}</a></li>
                @endforeach
                
            </ul>
            <form class="d-flex justify-content-end" method="post" action="{{ route( 'booking.destroy', $event->id ) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Cancel</button>
            </form>
        </div>
        @endforeach
    </div>
</div>



@endsection


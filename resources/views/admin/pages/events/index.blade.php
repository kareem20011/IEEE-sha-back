@extends("admin.layouts.layout")
@section("admin_content")

@if(session('status'))
<div class="alert alert-success">{{ session('status') }}</div>
@endif

<div style="overflow-x:auto;">
  <h3>All events</h3>
  <table class="responsive-table">
    
    <tr>
      <th>Id</th>
      <th>title</th>
      <th>description</th>
      <th>Number of tickets</th>
      <th>Expiry date</th>
      <th>status</th>
      <th>image</th>
      <th>Action</th>
    </tr>
    @foreach($events as $event)
    <tr>
      <td>#{{ $event->id }}</td>
      <td>{{ $event->title }}</td>
      <td>{{ $event->description }}</td>
      <td>{{ $event->number_of_tickets }}</td>
      <td>
        @if (\Carbon\Carbon::parse($event->expiry_date)->isPast())
        <p class="text-danger">Event has expired!</p>
        @else
        <p>{{ $event->expiry_date }}</p>
        @endif
      </td>
      <td>{{ $event->status == '0' ? 'Disabled' : 'Active' }}</td>
      <td>
        @if($event->hasMedia('images'))
          <img class="dashboard-table-image" src="{{ $event->getFirstMedia('images')->getUrl() }}" alt="{{ $event->title }}">
        @else
          <p>No image</p>
        @endif
      </td>
      <td>
        <a href="{{ route( 'admin.events.show', $event->id ) }}">Show</a>
        <a href="{{ route( 'admin.events.edit', $event->id ) }}">Edit</a>
      </td>
    </tr>
    @endforeach
  </table>
</div>


@endsection
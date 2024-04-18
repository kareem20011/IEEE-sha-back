@extends("admin.layouts.layout")
@section("admin_content")

@if(session('status'))
<div class="alert alert-success">{{ session('status') }}</div>
@endif

<div style="overflow-x:auto;">
  <h2>All events</h2>
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
    @if(count($events) < 1)
      <td colspan="8" class="p-5">
          <p class="text-center">No items found.</p>
      </td>
    @else
      @foreach($events as $event)
        <tr>
          <td>#{{ ++$counter }}</td>
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
          <td>
            @if($event->status == 0)
              <span class="text-danger">Disabled</span>
              @else
              <span class="text-success">Activated</span>
            @endif
          </td>
          <td>
            @if($event->hasMedia('images'))
              <img class="dashboard-table-image" src="{{ $event->getFirstMedia('images')->getUrl() }}" alt="{{ $event->title }}">
            @else
              <p>No image</p>
            @endif
          </td>
          <td>
            <a href="{{ route( 'admin.events.edit', $event->id ) }}"><i class="fa-solid fa-pen-to-square"></i></a>
            <a class="text-danger" href="{{ route( 'admin.events.delete', $event->id ) }}"><i class="fa-solid fa-trash"></i></a>
          </td>
        </tr>
      @endforeach
    @endif
  </table>
  <div class="container">
      <a href="{{ route( 'admin.events.create' ) }}" class="btn btn-info ms-0 mt-3 col-12">Create new</a>
  </div>
</div>


@endsection
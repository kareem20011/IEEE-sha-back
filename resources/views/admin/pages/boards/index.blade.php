@extends("admin.layouts.layout")
@section("admin_content")

@if(session('status'))
<div class="alert alert-success">{{ session('status') }}</div>
@endif

<div style="overflow-x:auto;">
  <h2>All boards</h2>
  <table class="responsive-table">
    
    <tr>
      <th>Id</th>
      <th>Title</th>
      <th>Description</th>
      <th>Category</th>
      <th>Status</th>
      <th>Image</th>
      <th>Action</th>
    </tr>
    @foreach($boards as $board)
        @if(count($boards) < 1)
            <p>no boards</p>
        @else
            <tr>
            <td>#{{ $board->id }}</td>
            <td>{{ $board->title }}</td>
            <td>{{ $board->description }}</td>
            <td>{{ $board->category->title }}</td>
            <td>
              @if($board->status == 1)
                <span class="text-success">Active</span>
              @else
                <span class="text-danger">Disable</span>
              @endif
            </td>
            <td>
                @if ($board->hasMedia('images'))
                <img class="dashboard-table-image" src="{{ $board->getFirstMediaUrl('images') }}" alt="{{ $board->name }}">
                @else
                <p>No image</p>
                @endif
            </td>
            <td>
                <a href="{{ route( 'admin.boards.show', $board->id ) }}">Show</a>
                <a href="{{ route( 'admin.boards.edit', $board->id ) }}">Edit</a>
            </td>
            </tr>
        @endif
    @endforeach
  </table>
</div>


@endsection
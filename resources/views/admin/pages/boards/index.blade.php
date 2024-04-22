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
      <th>Name</th>
      <th>Role</th>
      <th>Description</th>
      <th>Category</th>
      <th>Status</th>
      <th>Image</th>
      <th>Action</th>
    </tr>
    @if(count($boards) < 1)
      <td colspan="8" class="p-5">
          <p class="text-center">No items found.</p>
      </td>
    @else
    @foreach($boards as $board)
        @if(count($boards) < 1)
            <p>no boards</p>
        @else
            <tr>
            <td>#{{ $board->id }}</td>
            <td>{{ $board->title }}</td>
            <td>{{ $board->role }}</td>
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
                <a href="{{ route( 'admin.boards.edit', $board->id ) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                <a class="text-danger" href="{{ route( 'admin.boards.delete', $board->id ) }}"><i class="fa-solid fa-trash"></i></a>
              </td>
            </tr>
        @endif
    @endforeach
    @endif
  </table>
  <div class="container">
      <a href="{{ route( 'admin.boards.create' ) }}" class="btn btn-info ms-0 mt-3 col-12">Create new</a>
  </div>
</div>


@endsection
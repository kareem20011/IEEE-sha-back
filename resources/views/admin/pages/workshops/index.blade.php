@extends("admin.layouts.layout")
@section("admin_content")

@if(session('status'))
<div class="alert alert-success">{{ session('status') }}</div>
@endif

<div style="overflow-x:auto;">
  <h2>All workshops</h2>
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
    @if(count($workshops) < 1)
      <td colspan="7" class="p-5">
            <p class="text-center">No items found.</p>
      </td>
    @else
      @foreach($workshops as $workshop)
          @if(count($workshops) < 1)
              <p>no workshops</p>
          @else
              <tr>
              <td>#{{ $workshop->id }}</td>
              <td>{{ $workshop->title }}</td>
              <td>{{ $workshop->description }}</td>
              <td>{{ $workshop->category->title }}</td>
              <td>
                @if($workshop->status == 1)
                  <span class="text-success">Active</span>
                @else
                  <span class="text-danger">Disable</span>
                @endif
              </td>
              <td>
                  @if ($workshop->hasMedia('images'))
                  <img class="dashboard-table-image" src="{{ $workshop->getFirstMediaUrl('images') }}" alt="{{ $workshop->name }}">
                  @else
                  <p>No image</p>
                  @endif
              </td>
              <td>
                <a href="{{ route( 'admin.workshops.edit', $workshop->id ) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                <a class="text-danger" href="{{ route( 'admin.workshops.delete', $workshop->id ) }}"><i class="fa-solid fa-trash"></i></a>
              </td>
              </tr>
          @endif
      @endforeach
    @endif
  </table>
  <div class="container">
      <a href="{{ route( 'admin.workshops.create' ) }}" class="btn btn-info ms-0 mt-3 col-12">Create new</a>
  </div>
</div>


@endsection
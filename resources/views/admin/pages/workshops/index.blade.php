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
                <a href="{{ route( 'admin.workshops.show', $workshop->id ) }}">Show</a>
                <a href="{{ route( 'admin.workshops.edit', $workshop->id ) }}">Edit</a>
            </td>
            </tr>
        @endif
    @endforeach
  </table>
</div>


@endsection
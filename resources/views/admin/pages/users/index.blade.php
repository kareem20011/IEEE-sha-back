@extends("admin.layouts.layout")
@section("admin_content")

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div style="overflow-x:auto;">
<h2>All Users</h2>
  <table class="responsive-table">
    
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Email</th>
      <th>Image</th>
      <th>Role</th>
      <th>Action</th>
    </tr>
    @foreach($users as $user)
    @if($user->id == auth()->user()->id && auth()->user()->role == 'admin')
      @continue
    @else
    <tr>
      <td>#{{ $user->id }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>
        @if ($user->hasMedia('images'))
        <img class="dashboard-table-image" src="{{ $user->getFirstMediaUrl('images') }}" alt="{{ $user->name }}">
        @else
          <p>No image</p>
        @endif
      </td>
      <td>{{ $user->role }}</td>
      <td>
        <a href="{{ route( 'admin.users.show', $user->id ) }}">Show</a>
        <a href="{{ route( 'admin.users.edit', $user->id ) }}">Edit</a>
      </td>
    </tr>
    @endif
    @endforeach
  </table>
</div>


@endsection
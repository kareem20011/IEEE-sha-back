@extends("admin.layouts.layout")
@section("admin_content")

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div style="overflow-x:auto;">
  <table class="responsive-table">
    
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Email</th>
      <th>Role</th>
      <th>Action</th>
    </tr>
    @foreach($users as $user)
    <tr>
      <td>#{{ $user->id }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td style="color: {{ $user->role == 'admin' ? 'red' : 'black' }}">{{ $user->role }}</td>
      <td>
        <a href="{{ route( 'users.show', $user->id ) }}">Show</a>
        <a href="{{ route( 'users.edit', $user->id ) }}">Edit</a>
      </td>
    </tr>
    @endforeach
  </table>
</div>


@endsection
@extends("admin.layouts.layout")
@section("admin_content")
<div class="row">
    <div class="col-12">
        <div class="card">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="card-body">
                <div class="mb-5">
                    @if ($user->hasMedia('images'))
                        <img style="width: 200px;" src="{{ $user->getFirstMediaUrl('images') }}" alt="{{ $user->name }}">
                    @else
                        <p>No image</p>
                    @endif
                </div>
                <div class="mb-3">
                    <label>Name</label>
                    <input disabled type="text" class="form-control" value="{{ $user->name }}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input disabled type="email" class="form-control" value="{{ $user->email }}">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Role:</label>
                    <div class="form-check">
                        <input disabled {{ $user->role == 'admin' ? 'checked' : '' }} class="form-check-input" value="admin" type="radio" id="role1">
                        <label class="form-check-label" for="role1">Admin</label>
                    </div>
                    <div class="form-check">
                        <input disabled {{ $user->role == 'user' ? 'checked' : '' }} class="form-check-input" value="user" type="radio" id="role1">
                        <label class="form-check-label" for="role1">User</label>
                    </div>
                    @error('role')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                
                
                
                
            </div>
            <div class="card-footer text-right">
                <form method="post" action=" {{ route( 'admin.users.destroy', $user->id ) }} ">
                    @csrf
                    @method( 'DELETE' )
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="password" class="mt-3 mb-2">Enter your password to delete this user</label>
                    <input placeholder="Enter password here..." id="password" type="password" name="password" class="form-control">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <a href="{{ route( 'admin.users.index' ) }}" type="submit" class="btn btn-secondary mt-2">Cancel</a>
                </form>
            </div>
    </div>
</div>
@endsection

@extends("admin.layouts.layout")
@section("admin_content")
<div class="row">
    <div class="col-12">
        <div class="card">
        <form method="POST" action="{{ route( 'admin.users.update', $user->id ) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="card-body">
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Role:</label>
                    <div class="form-check">
                        <input {{ $user->role == 'admin' ? 'checked' : '' }} class="form-check-input" value="admin" type="radio" name="role" id="role1">
                        <label class="form-check-label" for="role1">Admin</label>
                    </div>
                    <div class="form-check">
                        <input {{ $user->role == 'user' ? 'checked' : '' }} class="form-check-input" value="user" type="radio" name="role" id="role1">
                        <label class="form-check-label" for="role1">User</label>
                    </div>
                    @error('role')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                
                <div class="mb-3">
                    <div class="d-flex align-items-start align-items-sm-center">
                        <div class="button-wrapper">
                            <p class="text-muted mb-0">Upload image JPG, PNG.</p>
                            <label for="upload" class="btn btn-primary" tabindex="0">
                                <span class="d-none d-sm-block">Upload new photo</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input name="image" type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                            </label>
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>





            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection

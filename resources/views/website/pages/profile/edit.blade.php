@extends('website.layouts.layout')
@section('header')

<div class="header-content p-lg-5 p-sm-2">
    <h1>Edit Profile</h1>
</div>

@endsection
@section('website_content')



<div class="container">
    <div class="row no-gutters row-bordered row-border-light">
        <div class="col-md-12">
            @if(Session::has('status'))
                <div class="alert alert-success mt-5">{{ Session::get('status') }}</div>
            @endif
            <div class="card overflow-hidden">
            <form action="{{ route( 'profile.update' ) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
                <div class="card-body media align-items-center">
                    <div class="d-flex align-items-center">
                        @if($user->hasMedia('images'))
                            <img name="image" src="{{ $user->getFirstMediaUrl('images') }}" alt="" class="website-image me-3">
                        @endif
                        <div class="media-body ml-4">
                            <label class="btn btn-outline-primary">
                                Upload new photo
                                <input name="image"  type="file" class="account-settings-fileinput">
                            </label> &nbsp;
                        </div>
                    </div>
                </div>
                <hr class="border-light m-0">
                <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" value="{{ $user->name }}" name="name" class="form-control" placeholder="Enter Your Name">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">E-mail</label>
                            <input type="email" value="{{ $user->email }}" name="email" class="form-control mb-1" placeholder="Enter Your Email">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            @if($user->email_verified_at == null)
                            
                                <div class="text-danger mt-3">
                                    Your email is not confirmed. Please check your inbox.<br>
                                </div>
                            
                            @endif
                        </div>
                        <button class=" btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>








            <div class="card overflow-hidden">
                <div class="card-body pb-2">
                    <form method="post" action="{{ route('profile.password') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="form-label">Current password</label>
                            <input name="current_password" type="password" class="form-control">
                            @error('current_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">New password</label>
                            <input name="password" type="password" class="form-control">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">confirm password</label>
                            <input name="password_confirmation" type="password" class="form-control">
                            @error('password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary mb-3">Update Password</button>
                    </form>

                    <form method="post" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('delete')
                        <div class="form-group mb-3">
                            <label class="form-label">Delete Acount</label>
                            <div class="text-danger my-3">
                                    Are Your sure you want delete your account?<br>
                                    Once you delete your account,there is no going back. please be certain.
                            </div>
                            <input type="hidden" name="id" value="{{ $user->id }}" class="form-control">
                            <input type="password" name="password_delete" class="form-control">
                            @error('password_delete')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <button class="remove-acount btn btn-danger">Remove Acount</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
</div>



@endsection
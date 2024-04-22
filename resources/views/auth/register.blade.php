@extends('layouts.guest')
@section('admin_login')
<div id="auth">
    <div class="row m-auto">
        <div class="col-12">
            <div id="auth-right">
                <h1 class="auth-title">Sign Up.</h1>
                <p class="auth-subtitle mb-5">Input your data to register to our website.</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control-xl" placeholder="Name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <!-- Email -->
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="email" class="form-control form-control-xl" placeholder="Email"  name="email" value="{{ old('email') }}" required autocomplete="username">
                        <div class="form-control-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                    </div>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <!-- Password -->
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control-xl" placeholder="Password" name="password" required autocomplete="new-password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                    <!-- Confirm Password -->
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control-xl" placeholder="Password" name="password_confirmation" required autocomplete="new-password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    @error('password_confirmation')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Sign Up</button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p class='text-gray-600'>Already have an account? <a href="{{ route( 'login' ) }}" class="font-bold">Log in</a>.</p>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
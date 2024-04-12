@extends('layouts.guest')
@section('admin_login')

    <div id="auth">
            
        <div class="row container m-auto">
            <div class="col-12">
                <div id="auth-right">
                    <h1 class="auth-title">Reset Password</h1>
                    <p class="auth-subtitle mb-5">We will send a link to reset your password</p>
        
                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">



                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" class="form-control form-control-xl" placeholder="Email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="email" >
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input class="form-control form-control-xl" placeholder="New Password" type="password" name="password" required autocomplete="new-password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input class="form-control form-control-xl" placeholder="Confirm Password" type="password" name="password_confirmation" required autocomplete="new-password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Send</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Remember your account? <a href="auth-login.html" class="font-bold">Log in</a>.
                        </p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

@endsection
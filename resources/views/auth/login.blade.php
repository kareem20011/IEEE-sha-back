@extends('layouts.guest')
@section('admin_login')
<div id="auth">
    <div class="row container m-auto">
        <div class="col-12">
            <div id="auth-right">
                <h1 class="auth-title">Log in.</h1>    
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="email" class="form-control form-control-xl" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email" >
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror


                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control-xl" placeholder="Password" name="password" required autocomplete="current-password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-check form-check-lg d-flex align-items-end">
                        <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label text-gray-600" for="flexCheckDefault" name="remember">
                            Keep me logged in
                        </label>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p>Don't have an account?<a class="font-bold" href="{{ route('register') }}">Sign up</a></p>
                    <p><a class="font-bold" href="{{ route('password.request') }}">Forgot password?</a></p>
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection
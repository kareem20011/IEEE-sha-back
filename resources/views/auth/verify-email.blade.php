@extends('layouts.guest')
@section('admin_login')

<div id="auth">
    <div class="row container m-auto h-100 align-items-center">
        <div class="col-12">
            <div id="auth-right">
                <h1 class="auth-title text-center">Verification</h1>
                <p class="auth-title text-center">we've sent a verification link to...</p>
                <input placeholder="{{ auth()->user()->email }}" class="form-control form-control-xl" disabled ></input>
                @if (session('status') == 'verification-link-sent')
                    <p class="text-success text-center">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </p>
                @endif
                <div class="row">
                    <div class="col-6">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Resend message</button>
                        </form>
                    </div>
                    <div class="col-6">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-block btn-lg shadow-lg mt-5">Log out</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection
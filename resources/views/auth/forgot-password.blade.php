@extends("layouts.guest")
@section("admin_login")
    <div id="auth">
            
        <div class="row m-auto">
            <div class="col-12">
                <div id="auth-right">
                    <h1 class="auth-title">Forgot Password.</h1>
                    <p class="auth-subtitle mb-5">Input your email and we will send you reset password link.</p>
                    
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" class="form-control form-control-xl" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            @if(Session::has('status'))
                                <div class="text-success">{{ Session::get("status") }}</div>
                            @endif
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Send</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Remember your account? <a href="{{ route('login') }}" class="font-bold">Log in</a>.
                        </p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
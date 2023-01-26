@extends('layouts.app')

@section('content')
<div class="container">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ url('/') }}"><b>Apartment Visitor</b> Management System</a>
            </div>
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="input-group mb-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                      <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    <p class="mt-3 mb-1">
                        @if (Route::has('login'))
                        <a href="{{ route('login') }}">
                            {{ __('Login') }}
                        </a>
                        @endif
                        {{-- <a href="forgot-password.html">I forgot my password</a> --}}
                    </p>
                    <p class="mb-0">
                        @if (Route::has('register'))
                                <a class="text-center" href="{{ route('register') }}">{{ __('Register a new membership') }}</a>
                        @endif
                        {{-- <a href="register.html" class="text-center">Register a new membership</a> --}}
                    </p>
                </div>
            </div>
        </div>
</div>
@endsection

@extends('layouts.auth')
@section('css')
<style>
    .invalid-feedback{
        display: block;
    }
</style>
@endsection
@section('content')
    <p class="login-box-msg">Sign in to start your session</p>
    <form action="{{route('login')}}" method="post">
        @csrf
        <div class="form-group">
            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="Password" required autocomplete="current-password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="icheck-primary">
                    <input type="checkbox" id="remember">
                    <label for="remember">
                        Remember Me
                    </label>
                </div>
            </div>
            <!-- Button's Column -->
            <div class="col-md-8">
                <button type="submit" class="btn btn-outline-secondary btn-lg btn-block" style="margin-left: 55px; margin-top: 10px">Sign In</button>
            </div>
        </div>
        
    </form>

    <div class="footer-wrapper" style="margin-top:10px">        
        <p class="mb-1">
            <a href="{{ route('password.request')}}">I forgot my password</a>
        </p>
        <p class="mb-0">
            <a href="{{route('register')}}" class="text-center">Register a new account</a>
        </p>
    </div>
@endsection

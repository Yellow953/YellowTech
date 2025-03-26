@extends('auth.app')

@section('title', 'Login')

@section('content')
<div class="login-logo">
    <img src="{{ asset('assets/logo/logo.png') }}" width="100">
</div>

<h1 class="text-center fw-bold text-black mb-4">LOGIN</h1>

<form method="POST" action="{{ route('login') }}" class="text-start">
    @csrf
    @include('admin.layouts._flash')

    <div class="form-group has-feedback">
        <input name="email" type="text" class="form-control" placeholder="Email" autofocus value="{{ old('email') }}"
            required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <input name="password" type="password" class="form-control" placeholder="Password" required />
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
        <div class="d-flex align-items-center justify-content-between px-4 mb-3">
            <label>
                <input type="checkbox" name="remember"> Remember Me
            </label>
            <a href="{{ route('password.request') }}">I forgot my password</a>
        </div>

        <div class="col-12 px-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat btn-custom">Sign In</button>
        </div>
    </div>
</form>
@endsection
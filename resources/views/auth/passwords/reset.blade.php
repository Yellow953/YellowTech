@extends('auth.app')

@section('title', 'Reset Password')

@section('content')
<div class="login-logo">
    <img src="{{ asset('assets/logo/logo.png') }}" width="100">
</div>

<h1 class="text-center fw-bold text-black mb-4">Reset Password</h1>

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<form method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="row mb-3">
        <label for="email" class="col-md-12 col-form-label text-md-end">{{ __('Email Address')
            }}</label>

        <div class="col-md-12">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="password" class="col-md-12 col-form-label text-md-end">{{ __('Password')
            }}</label>

        <div class="col-md-12">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="password-confirm" class="col-md-12 col-form-label text-md-end">{{ __('Confirm
            Password') }}</label>

        <div class="col-md-12">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                autocomplete="new-password">
        </div>
    </div>

    <button type="submit" class="btn btn-primary btn-block">
        {{ __('Reset Password') }}
    </button>
</form>
@endsection
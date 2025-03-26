@extends('auth.app')

@section('title', 'Verify Email')

@section('content')
<div class="login-logo">
    <img src="{{ asset('assets/logo/logo.png') }}" width="100">
</div>

<h1 class="text-center fw-bold text-black mb-4">Verify Email</h1>

@if (session('resent'))
<div class="alert alert-success" role="alert">
    {{ __('A fresh verification link has been sent to your email address.') }}
</div>
@endif

{{ __('Before proceeding, please check your email for a verification link.') }}
{{ __('If you did not receive the email') }},
<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
    @csrf
    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another')
        }}</button>.
</form>
@endsection
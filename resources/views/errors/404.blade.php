@extends('auth.app')

@section('title', '404')

@section('content')
<div class="login-logo">
    <img src="{{ asset('assets/logo/logo.png') }}" width="100">
</div>

<div class="text-center text-black">
    <h1 class="fw-bold">404</h1>
    <h4 class="mb-4">Ooops!!! Page Not Found...</h4>
    <p><a class="back-home btn btn-primary btn-block" href="{{ route('home') }}">Back</a></p>
</div>
@endsection
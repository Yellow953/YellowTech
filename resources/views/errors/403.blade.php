@extends('auth.app')

@section('title', '403')

@section('content')
<div class="login-logo">
    <img src="{{ asset('assets/logo/logo.png') }}" width="100">
</div>

<div class="text-center text-black">
    <h1 class="fw-bold">403</h1>
    <h4 class="mb-4">Ooops!!! Access Denied...</h4>
    <p><a class="back-home btn btn-primary btn-block" href="{{ route('home') }}">Back</a></p>
</div>
@endsection
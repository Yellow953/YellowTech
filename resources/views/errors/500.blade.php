<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Yellowtech</title>

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{asset('assets/logo/favicon.png')}}">

    {{-- Coding Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@500&display=swap" rel="stylesheet">

    <meta name="google-site-verification" content="BeAs6nmdgCTXSjnLMq_pfDksaT12n0uZ7Im9_E2Eliw" />

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/errors.css') }}">
</head>

<body>
    <div class="section">
        <img src="{{ asset('assets/logo/logo.png') }}" alt="yellowtech logo" class="logo">
        <h1 class="error">500</h1>
        <div class="page">Ooops!!! Internal Server Error...</div>
        <a class="back-home" href="{{ route('home') }}">Back</a>
    </div>
</body>

</html>
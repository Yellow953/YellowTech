<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('assets/logo/yellowtech.png') }}" type="image/x-icon">

    <title>YellowTech | @yield('title')</title>

    <!-- MY CSS STYLES -->
    <link href="{{ asset('assets/css/mystyles.css') }}" rel="stylesheet" type="text/css" />

    {{-- Meta --}}
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">

    {{-- Font Awesome Icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Coding Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@500&display=swap" rel="stylesheet">

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}" />

    <!-- Add these links to the head section of your HTML -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />

    <!-- responsive style -->
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" />

    {{-- custom styles --}}
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    {{-- Google Analytics --}}
    <meta name="google-site-verification" content="BeAs6nmdgCTXSjnLMq_pfDksaT12n0uZ7Im9_E2Eliw" />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-1CKZFK5R5G"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-1CKZFK5R5G');
    </script>
</head>

<body class="overflow-x-hidden">
    @include('layouts._header')

    @yield('content')

    @include('layouts._footer')

    <script type="text/javascript" src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
    </script>

    @include('layouts._subscribe_popup')
</body>

</html>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('assets/logo/favicon.png') }}" type="image/x-icon">

    <title>YellowTech | @yield('title')</title>

    <!-- MY CSS STYLES -->
    <link href="{{ asset('assets/css/mystyles.css') }}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />

    <!-- Theme style -->
    <link href="{{ asset('admin/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('admin/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- bootstrap wysihtml5 - text editor -->
    <link href="{{ asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet"
        type="text/css" />

    <link rel="stylesheet" href="{{ asset('admin/css/login.css') }}">

    <style>
        body {
            background-image: url('{{ asset("assets/images/yellow-gradient-bg.png") }}');
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <div class="login-box-body">
            @yield('content')
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('admin/js/custom.js') }}"></script>
</body>

</html>
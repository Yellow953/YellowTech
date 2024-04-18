<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- Favicon --}}
  <link rel="shortcut icon" href="{{ asset('assets/logo/yellowtech.png') }}" type="image/x-icon">

  <title>YellowTech | Login</title>

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
      background-image: url('{{ asset("assets/images/Post1.png") }}');
      background-size: cover;
      background-repeat: no-repeat;
    }
  </style>
</head>

<body>
  <div class="login-box">
    <div class="login-logo">
      <a class="login-title" href="#"><b>Admin</b>YellowTech</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
      <h1 class="text-center mb-4">Log in</h1>
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
    </div><!-- /.login-box-body -->
  </div><!-- /.login-box -->

  <script type="text/javascript" src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('admin/js/custom.js') }}"></script>
</body>

</html>
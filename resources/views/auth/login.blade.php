<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>YellowTech | Log in</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- Favicon --}}
  <link rel="shortcut icon" href="{{ asset('assets/logo/yellowtech.ico') }}" type="image/x-icon">

  <!-- MY CSS STYLES -->
  <link href="{{ asset('assets/css/mystyles.css') }}" rel="stylesheet" type="text/css" />


  <!-- Bootstrap 3.3.2 -->
  <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

  <!-- FontAwesome 4.3.0 -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
    type="text/css" />

  <!-- Ionicons 2.0.0 -->
  <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />

  <!-- Theme style -->
  <link href="{{ asset('admin/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
  <link href="{{ asset('admin/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- iCheck -->
  <link href="{{ asset('admin/plugins/iCheck/flat/blue.css') }}" rel="stylesheet" type="text/css" />

  <!-- Morris chart -->
  <link href="{{ asset('admin/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />

  <!-- jvectormap -->
  <link href="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />

  <!-- Date Picker -->
  <link href="{{ asset('admin/plugins/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css" />

  <!-- Daterange picker -->
  <link href="{{ asset('admin/plugins/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />

  <!-- bootstrap wysihtml5 - text editor -->
  <link href="{{ asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet"
    type="text/css" />

  <style>
    body {
      background-image: url('{{ asset("assets/images/adi-goldstein-EUsVwEOsblE-unsplash (1) (1).jpg") }}');
      background-size: cover;
      background-repeat: no-repeat;
    }

    .mb-4 {
      margin-bottom: 25px;
    }

    .my-auto {
      margin-top: auto;
      margin-bottom: auto;
    }

    .my-0 {
      margin-top: 0;
      margin-bottom: 0;
    }

    .px-4 {
      padding-left: 25px;
      padding-right: 25px;
    }

    input.form-control {
      border-radius: 10px !important;
    }
  </style>

</head>

<body>
  <div class="login-box">
    <div class="login-logo">
      <a class="login-title" href="{{ asset('docs/AdminLTE/index2.html')}}"><b>Admin</b>YellowTech</a>
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
          <div class="col-xs-6 mb-4">
            <div class="checkbox icheck my-0">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
          </div>
          <div class="col-xs-6 mb-4">
            <a href="{{ route('password.request') }}">I forgot my password</a><br>
          </div>

          <div class="col-12 px-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
        </div>
      </form>
    </div><!-- /.login-box-body -->
  </div><!-- /.login-box -->

  <!-- jQuery 2.1.3 -->
  <script src="{{ asset('admin/plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>

  <!-- jQuery UI 1.11.2 -->
  <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>

  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>

  <!-- Bootstrap 3.3.2 JS -->
  <script src="{{ asset('admin/js/bootstrap.min.js') }}" type="text/javascript"></script>

  <!-- Morris.js charts -->
  <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

  <script src="{{ asset('admin/plugins/morris/morris.min.js') }}" type="text/javascript"></script>
  <!-- Sparkline -->
  <script src="{{ asset('admin/plugins/sparkline/jquery.sparkline.min.js') }}" type="text/javascript"></script>
  <!-- jvectormap -->
  <script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}" type="text/javascript">
  </script>
  <script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript">
  </script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset('admin/plugins/knob/jquery.knob.js') }}" type="text/javascript"></script>
  <!-- daterangepicker -->
  <script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
  <!-- datepicker -->
  <script src="{{ asset('admin/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="{{ asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript">
  </script>
  <!-- iCheck -->
  <script src="{{ asset('admin/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
  <!-- Slimscroll -->
  <script src="{{ asset('admin/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
  <!-- FastClick -->
  <script src='{{ asset(' admin/plugins/fastclick/fastclick.min.js') }}'></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('admin/js/app.min.js') }}" type="text/javascript"></script>

  <script src="{{ asset('admin/js/pages/dashboard.js') }}" type="text/javascript"></script>

  <script>
    $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
  </script>
</body>

</html>
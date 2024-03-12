<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- Favicon --}}
  <link rel="shortcut icon" href="{{ asset('assets/logo/yellowtech.ico') }}" type="image/x-icon">

  <title>YellowTech | AdminPage</title>

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

  <!-- DATA TABLES -->
  <link href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
  <script src="https://kit.fontawesome.com/c09f3917c9.js" crossorigin="anonymous"></script>

  {{-- select2 --}}
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  {{-- Custom CSS --}}
  <link rel="stylesheet" href="{{ asset('admin/css/admin.css') }}">
</head>

<body class="skin-blue">
  <div class="wrapper">
    @include('admin.layouts._header')

    @include('admin.layouts._sidebar')

    <!-- Right side column. Contains the navbar and content of the page -->
    <div class="content-wrapper">
      @include('admin.layouts._navbar')
      <br><br><br>
      @include('admin.layouts._flash')

      @yield('content')
    </div>
  </div><!-- ./wrapper -->

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

  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('admin/js/pages/dashboard.js') }}" type="text/javascript"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('admin/js/demo.js') }}" type="text/javascript"></script>

  <!-- DATA TABES SCRIPT -->
  <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
  <script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script>

  <!-- page script -->
  <script type="text/javascript">
    $(function () {
      $("#example1").dataTable();
      $('#example2').dataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false
      });
    });
  </script>

  <!--logout-->
  <script>
    function logout() {
        document.getElementById('logoutForm').submit();
    }
  </script>

  {{-- Sweet Alert --}}
  <script src="{{asset('admin/js/sweetalert.min.js')}}"></script>

  {{-- custom js --}}
  <script src="{{ asset('admin/js/custom.js') }}"></script>
</body>

</html>
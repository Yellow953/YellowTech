<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- Favicon --}}
  <link rel="shortcut icon" href="{{ asset('assets/logo/yellowtech.png') }}" type="image/x-icon">

  <title>YellowTech | @yield('title')</title>

  <!-- Bootstrap -->
  <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

  <!-- FontAwesome -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
    type="text/css" />
  <script src="https://kit.fontawesome.com/c09f3917c9.js" crossorigin="anonymous"></script>

  <!-- Ionicons -->
  <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />

  <!-- AdminLTE -->
  <link href="{{ asset('admin/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('admin/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />

  <!-- jQuery -->
  <script src="{{ asset('admin/plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>
  <!-- jQuery UI -->
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>

  <!-- Bootstrap JS -->
  <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>

  <!-- DataTables -->
  <link href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
  <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap.js') }}"></script>

  <!-- FullCalendar -->
  <link href="{{ asset('admin/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('admin/plugins/fullcalendar/fullcalendar.print.css')}}" rel="stylesheet" type="text/css"
    media='print' />
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js"></script>
  <script src="{{ asset('admin/plugins/fullcalendar/fullcalendar.min.js')}}"></script>

  <!-- iCheck -->
  <link href="{{ asset('admin/plugins/iCheck/flat/blue.css') }}" rel="stylesheet" type="text/css" />
  <script src="{{ asset('admin/plugins/iCheck/icheck.min.js') }}"></script>

  <!-- Date Picker -->
  <link href="{{ asset('admin/plugins/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css" />
  <script src="{{ asset('admin/plugins/datepicker/bootstrap-datepicker.js') }}"></script>

  <!-- Daterange picker -->
  <link href="{{ asset('admin/plugins/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />
  <script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>

  <!-- wysihtml5 -->
  <link href="{{ asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet"
    type="text/css" />
  <script src="{{ asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>

  <!-- jvectormap -->
  <link href="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
  <script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

  <!-- Slimscroll -->
  <script src="{{ asset('admin/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>

  <!-- FastClick -->
  <script src="{{ asset('admin/plugins/fastclick/fastclick.min.js') }}"></script>

  <!-- AdminLTE App -->
  <script src="{{ asset('admin/js/app.min.js') }}"></script>

  <!-- AdminLTE demo -->
  <script src="{{ asset('admin/js/demo.js') }}"></script>

  <!-- Morris.js -->
  <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="{{ asset('admin/plugins/morris/morris.min.js') }}"></script>

  <!-- Sparkline -->
  <script src="{{ asset('admin/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

  <!-- jQuery Knob Chart -->
  <script src="{{ asset('admin/plugins/knob/jquery.knob.js') }}"></script>

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('admin/css/admin.css') }}">

  {{-- select2 --}}
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <!-- Sweet Alert -->
  <script src="{{asset('admin/js/sweetalert.min.js')}}"></script>

  <!-- Custom JS -->
  <script src="{{ asset('admin/js/custom.js') }}"></script>
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
  </div>
</body>

</html>

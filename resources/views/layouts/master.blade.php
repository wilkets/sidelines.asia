<!DOCTYPE>
<html>
<head>
    <title> @yield('title')</title>

    <!-- <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"> -->
    <!-- Local -->
    <link rel="stylesheet" type="text/css" href="{!! asset('dist/css/bootstrap.min.css') !!}">
    <!-- datetimepicker -->
    <link rel="stylesheet" type="text/css" href="{!! asset('dist/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') !!}" >
    <link rel="stylesheet" type="text/css" href="{!! asset('dist/css/bootstrap-datetimepicker.min.css') !!}" >
    <!-- select2 -->
    <link rel="stylesheet" type="text/css" href="{!! asset('dist/css/select2.min.css') !!}">
    <!-- AdminLTE -->
    <link rel="stylesheet" type="text/css" href="{!! asset('dist/css/AdminLTE.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('dist/css/skins/skin-blue-light.min.css') !!}">
    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="{!! asset('dist/plugins/datatables/dataTables.bootstrap.css') !!}">
    <!-- daterange picker -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/daterangepicker/daterangepicker-bs3.css') }}">
    <link rel="stylesheet" type="text/css" href="{!! asset('dist/css/style.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('dist/css/editprofile.css') !!}">

    <link href="{!! asset('dist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}" rel="stylesheet" type="text/css" />

    <link rel="shortcut icon" href="/dist/img/icon.ico">

    <!-- URLs -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head>
<body class="hold-transition skin-blue-light sidebar-mini">

  <div class="wrapper" >

        @include('layouts.main-header')
        @include('layouts.main-sidebar')

        @yield('content')

        @include('layouts.main-footer')

    </div>

  <!-- AdminLTE -->

  <script src="{!! asset('dist/plugins/jQuery/jQuery-2.1.4.min.js') !!}"></script>
  <script src="{!! asset('dist/js/bootstrap.min.js') !!}"></script>
  <script src="{!! asset('dist/js/app.min.js') !!}"></script>
  <!-- datetimepicker -->
  <script src="{!! asset('dist/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') !!}"></script>
  <script src="{!! asset('dist/js/bootstrap-datetimepicker.min.js') !!}"></script>
  <!-- DataTable -->
  <script src="{!! asset('dist/plugins/datatables/jquery.dataTables.min.js') !!}"></script>
  <script src="{!! asset('dist/plugins/datatables/dataTables.bootstrap.min.js') !!}"></script>
  <script src="{!! asset('dist/plugins/daterangepicker/daterangepicker.js') !!}"></script>
  <!-- select2 -->

  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>

  <script src="{!! asset('dist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}" type="text/javascript"></script>
  <script src="{!! asset('dist/plugins/iCheck/icheck.min.js" type="text/javascript') !!}"></script>
  <script src="{!! asset('dist/js/dashboard.js" type="text/javascript') !!}"></script>

  <script src="{!! asset('dist/js/select2.min.js') !!}"></script>
  <!-- style -->
  <script src="{!! asset('dist/js/style.js') !!}"></script>
</body>
</html>

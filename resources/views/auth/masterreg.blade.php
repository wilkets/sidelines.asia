<!DOCTYPE html>
<html>
<head>
    <title> @yield('title')</title>

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
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link rel="shortcut icon" href="/dist/img/icon.ico">

</head>

<body class="hold-transition register-page style-login-body">

    @yield('content')

</body>

    <script src="{!! asset('dist/plugins/jQuery/jQuery-2.1.4.min.js') !!}"></script>
    <script src="{!! asset('dist/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('dist/js/app.min.js') !!}"></script>
    <script src="{!! asset('dist/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') !!}"></script>
    <script src="{!! asset('dist/js/bootstrap-datetimepicker.min.js') !!}"></script>
    <script src="{!! asset('dist/js/demo.js') !!}"></script>

</html>

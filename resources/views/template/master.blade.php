<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield('title')</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.css')}}">

    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.3.0/css/fixedColumns.dataTables.min.css">
    <!-- Confirm css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
    @include('template.nav')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('template.breadcumb')
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container">
                @yield('contenido')
            </div><!-- /.container -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            {{now()->format('Y')}} - {{now()->addYear()->format('Y')}}
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; <a target="_blank" href="https://dasalflor.yurasystem.com">Yura System</a>.</strong> Todos los derechos reservados.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.min.js')}}"></script>

<!-- DataTables -->
<script src="{{asset('js/jquery.dataTables.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.0/js/dataTables.fixedColumns.min.js"></script>
<!-- Confirm js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<!-- Validate js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

<!-- Custom js -->
<script src="{{asset('js/helper.js')}}"></script>
@yield('custom_script')
</body>
</html>

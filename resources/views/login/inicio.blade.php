<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.css')}}">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

</head>
<body class="hold-transition login-page">
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <div class="login-logo">
                <img src="{{url('img/logo_yura_brenchmark.png')}}" class="img-size-100" alt="logo benchmark">
            </div>

            <p class="login-box-msg restaurar-contrasena-custom mb-0 pb-0">Hola! Bienvenido a benchmark</p>
            <p class="login-box-msg">Inicia sesión:</p>

            <form action="" method="post">
                {{@csrf_field()}}
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Usuario">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user-circle"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Contraseña">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row mb-4 ml-0 mr-0 ">
                    <div class="text-center">
                        {!! NoCaptcha::renderJs() !!}
                        {!! NoCaptcha::display() !!}
                        <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-login btn-block">
                            <i class="fas fa-sign-in-alt"></i> Ingresar
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <p class="m-3">
                <a href="#" class="restaurar-contrasena-custom">
                    <i class="fas fa-lock"></i> Olvidé mi contraseña
                </a>
            </p>
        </div>

    </div>
</div>
</body>
</html>

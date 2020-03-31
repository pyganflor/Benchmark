<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Benchmark | Log in</title>
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
    <div class="card" style="border-radius:60px; background-color: #ffffffbf;">
        <div class="card-body login-card-body">
            <div class="login-logo">
                <img src="{{url('img/logo_yura_brenchmark.png')}}" class="img-size-100" alt="logo benchmark">
            </div>

            <p class="login-box-msg restaurar-contrasena-custom mb-0 pb-0 font-weight-bold">Hola! Bienvenido a benchmark</p>
            <p class="login-box-msg">Inicia sesión:</p>

            <form action="{{url('login/acceder')}}" method="post">
                {{@csrf_field()}}

                    <div class="input-group mb-2">
                        <div class="input-group-prepend {{$errors->has('usuario') ? 'border border-danger' :'' }}">
                            <div class="input-group-text fa-login border-silver" style="border-radius:0;">
                                <span class="fas fa-user-circle {{$errors->has('usuario') ? 'text-red' :'' }}"></span>
                            </div>
                        </div>
                        <input class="form-control {{$errors->has('usuario') ? 'border border-danger' :'' }}"
                               placeholder="Usuario" type="text" name="usuario" value="{{old('usuario')}}">
                    </div>
                    @if ($errors->has('usuario'))
                        <div class="text-red mb-1">
                            <i class="far fa-times-circle"></i> {{$errors->first('usuario')}}
                        </div>
                    @endif
                    <div class="input-group mb-2">
                        <div class="input-group-prepend {{$errors->has('contrasena') ? 'border border-danger' :'' }}">
                            <div class="input-group-text fa-login border-silver" style="border-radius:0">
                                <span class="fas fa-lock  {{$errors->has('contrasena') ? 'text-red' :'' }}"></span>
                            </div>
                        </div>
                        <input class="form-control {{$errors->has('contrasena') ? 'border border-danger' :'' }}"
                                name="contrasena" placeholder="Contraseña" type="password">
                    </div>
                    @if ($errors->has('contrasena'))
                        <div class="text-red mb-1">
                            <i class="far fa-times-circle"></i> {{$errors->first('contrasena')}}
                        </div>
                    @endif
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
            <p class="m-3 text-center">
                <a href="#" class="restaurar-contrasena-custom">
                    <i class="fas fa-lock"></i> Olvidé mi contraseña
                </a>
            </p>
        </div>

    </div>
</div>
</body>
</html>

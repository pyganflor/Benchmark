@extends('template.master')

@section('titulo')
    Administración de usuarios
@endsection

@section('contenido')
<div class="p-md-4 p-sm-2 bg-white rounded shadow mb-md-5 mb-sm-1 w-100">
    <!-- Rounded tabs -->
    <ul id="myTab" role="tablist"
        class="nav nav-tabs nav-pills flex-column flex-sm-row text-center bg-light border-0 rounded-nav">
        @if(session('id_rol') === 3)
            <li class="nav-item flex-sm-fill">
                <a id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                   aria-selected="true" class="nav-link border-0 text-uppercase font-weight-bold active">
                    Crear usuario
                </a>
            </li>
            <li class="nav-item flex-sm-fill">
                <a id="profile-tab" data-toggle="tab" href="#user_admin" role="tab" aria-controls="profile"
                   aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">
                    Crear Administrador
                </a>
            </li>
        @endif
        <li class="nav-item flex-sm-fill">
            <a id="accesos-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
               aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold {{session('id_rol') != 3 ? 'active' : '' }}">
                Editar accesos
            </a>
        </li>
    </ul>
    <div id="myTabContent" class="tab-content">
        @if(session('id_rol') === 3)
            <div id="home" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-5 show active">
            <div class="row ">
                <div class="col-md-9 col-xs-12 col-lg-6 col-sm-12 offset-md-3">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Escriba un correo electrónico válido"
                               aria-describedby="basic-addon2" id="correo_usuario" required>
                        <div class="input-group-append">
                            <button class="btn btn-green-custom" type="button" title="Enviar correo" onclick="enviar_correo(null,'correo_usuario')" >
                                <span class="d-none d-md-block d-lg-block"><i class="far fa-envelope"></i> Enviar correo</span>
                                <span class="d-md-none d-lg-none"><i class="far fa-envelope"></i></span>
                            </button>
                        </div>
                    </div>
                    <small>
                        <em><b>Nota:</b> Se creará un nuevo <b>Usuario</b> y se enviará un mail con los accesos al correo ingresado</em>
                    </small>
                </div>
            </div>
        </div>
            <div id="user_admin" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade px-4 py-5">
                <div class="row ">
                    <div class="col-md-9 col-xs-12 col-lg-6 col-sm-12 offset-md-3">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Escriba un correo electrónico válido"
                                   aria-describedby="basic-addon2" id="correo_administrador" required>
                            <div class="input-group-append">
                                <button class="btn btn-green-custom" type="button" title="Enviar correo" onclick="enviar_correo(null,'correo_administrador')">
                                    <span class="d-none d-md-block d-lg-block"><i class="far fa-envelope"></i> Enviar correo</span>
                                    <span class="d-md-none d-lg-none"><i class="far fa-envelope"></i></span>
                                </button>
                            </div>
                        </div>
                        <small>
                            <em><b>Nota:</b> Se creará un nuevo <b>Adminsitrador</b> y se enviará un mail con los accesos al correo ingresado</em>
                        </small>
                    </div>
                </div>
            </div>
        @endif
        <div id="profile" role="tabpanel" aria-labelledby="accesos-tab" class="tab-pane fade px-4 py-5 {{session('id_rol') != 3 ? 'show active' : '' }}">
            <div class="row">
                <div class="col-md-8 col-sm-12  offset-md-2  offset-sm-0">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 p-2">
                            <input type="text" class="form-control input-datos-manual-custom text-center"
                                   id="usuario" name="usuario" placeholder="Ingrese el nuevo usuario" required>
                        </div>
                        <div class="col-md-6 col-sm-12 p-2">
                            <input type="password" class="form-control input-datos-manual-custom text-center"
                                   id="contrasena" name="contrasena" placeholder="Ingrese la nueva contrasena" required>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 w-100 text-center mt-3">
                    <button type="button" class="btn btn-green-custom" onclick="actualizar_acessos()">
                        <i class="fas fa-save"></i> Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End rounded tabs -->
</div>

@endsection
@section('custom_script')
    @include('usuario.script')
@endsection

<style>
    @include('usuario.style')
</style>

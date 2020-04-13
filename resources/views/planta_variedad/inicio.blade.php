@extends('template.master')

@section('titulo')
    Plantas y variedades
@endsection

@section('contenido')
    <div class="p-md-4 p-sm-2 bg-white rounded shadow mb-md-5 mb-sm-1 w-100">
        <!-- Rounded tabs -->
        <ul id="myTab" role="tablist"
            class="nav nav-tabs nav-pills flex-column flex-sm-row text-center bg-light border-0 rounded-nav">
            @if(session('id_rol') === 3 || session('id_rol') ===1)
                <li class="nav-item flex-sm-fill">
                    <a id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                       aria-selected="true" class="nav-link border-0 text-uppercase font-weight-bold active">
                        Crear plantas
                    </a>
                </li>
                <li class="nav-item flex-sm-fill">
                    <a id="profile-tab" data-toggle="tab" href="#user_admin" role="tab" aria-controls="profile"
                       aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">
                        Crear Variedades
                    </a>
                </li>
            @endif
            @if(session('id_rol') === 2)
                <li class="nav-item flex-sm-fill">
                    <a id="accesos-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                       aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold {{session('id_rol') != 3 ? 'active' : '' }}">
                        Asignar variedades
                    </a>
                </li>
            @endif
        </ul>
        <div id="myTabContent" class="tab-content">
            @if(session('id_rol') === 3 || session('id_rol') ===1)
                <div id="home" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-5 show active">
                    <div class="row" id="tabla_plantas"></div>
                </div>
                <div id="user_admin" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade px-4 py-5">
                    <div class="row" id="tabla_variedades"></div>
                </div>
            @endif
            @if(session('id_rol') === 2)
                <div id="profile" role="tabpanel" aria-labelledby="accesos-tab" class="tab-pane fade px-4 py-5 {{session('id_rol') != 3 ? 'show active' : '' }}">
                    <div class="row" id="tabla_asigna_variedad"> </div>
                </div>
            @endif
        </div>
        <!-- End rounded tabs -->
    </div>
@endsection
@section('custom_script')
    @include('planta_variedad.script')
@endsection
<style> @include('planta_variedad.style') </style>

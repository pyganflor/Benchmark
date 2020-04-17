@extends('template.master')

@section('titulo')
    Datos
@endsection

@section('contenido')
    <div class="col-12">
        <div class="input-group">
            <div class="input-group-append">
                <buttom class="btn btn-sm btn-green-custom bnt-round m-1"
                        id="importar_archivo" style="cursor: pointer">
                    <i class="far fa-file-alt"></i> Importar archivo
                </buttom>
                <buttom class="btn btn-sm btn-green-custom bnt-round m-1"
                        id="carga_datos_manual" style="cursor: pointer">
                    <i class="fas fa-plus-circle"></i> Añadir datos
                </buttom>
                <buttom class="btn btn-sm btn-green-custom bnt-round m-1"
                        id="btn_tabla" style="cursor: pointer">
                    <i class="fas fa-search"></i> Buscar
                </buttom>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card-header">
            <h3 class="card-title w-65">
                <div class="form-row">
                    <div class="col-md-3 col-sm-6 mt-2 mt-md-0">
                        <div class="input-group-prepend">
                        <span class="input-group-text bg-silver-dark-custom all-round icon-select-custom">
                            <i class="fas fa-cubes"></i>
                        </span>
                        </div>
                        <select class="select-custom form-control form-control-sm all-round font-weight-bold"
                                id="planta_bechmark">
                            <option selected disabled value="">Plantas</option>
                            @foreach($plantas as $planta)
                                <option value="{{$planta->id_planta}}">{{$planta->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-6 mt-2 mt-md-0">
                        <div class="input-group-prepend">
                        <span class="input-group-text bg-silver-dark-custom all-round icon-select-custom">
                            <i class="fas fa-cubes"></i>
                        </span>
                        </div>
                        <select class="select-custom form-control form-control-sm all-round font-weight-bold"
                                id="id_variedad">
                            <option selected disabled value="">Variedad</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-6 mt-2 mt-md-0">
                        <div class="input-group-prepend">
                        <span class="input-group-text bg-silver-dark-custom all-round icon-select-custom">
                            <i class="far fa-calendar-alt"></i>
                        </span>
                        </div>
                        <select class="select-custom form-control form-control-sm all-round font-weight-bold"
                                id="desde">
                            <option selected disabled value="">Desde</option>
                            @foreach($semanas as $semana)
                                <option value="{{$semana->semana}}">{{$semana->semana}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-6 mt-2 mt-md-0">
                        <div class="input-group-prepend">
                        <span class="input-group-text bg-silver-dark-custom all-round icon-select-custom">
                            <i class="far fa-calendar-alt"></i>
                        </span>
                        </div>
                        <select class="select-custom form-control form-control-sm all-round font-weight-bold"
                                id="hasta">
                            <option selected disabled value="">Hasta</option>
                            @foreach($semanas as $semana)
                                <option value="{{$semana->semana}}">{{$semana->semana}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </h3>
            <div class="card-tools tools-leyenda">
                <ul class="list-group list-group-horizontal list-group-horizontal-sm">
                    <li class="leyeda-datos" style="border-right: 1px solid #dee2e6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                Leyenda
                            </div>
                        </div>
                    </li>
                    <li class="leyeda-datos">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="leyenda-finca"></div> Finca
                            </div>
                        </div>
                    </li>
                    <li class="leyeda-datos">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="leyenda-promedio"></div> Promedio
                            </div>
                        </div>
                    </li>
                    <li class="leyeda-datos">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="leyenda-mejor"></div> El mejor
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0 w-100" id="tabla_benchmark"></div>
        <!-- /.card-body -->
    </div>
@endsection

@section('custom_script')
    @include('benchmark.script')
@endsection

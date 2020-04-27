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
                <buttom class="btn btn-sm btn-green-custom bnt-round m-1" style="cursor: pointer">
                    <i class="far fa-file-excel"></i> Excel
                </buttom>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card-header">
            <h3 class="card-title w-65">
                <div class="form-row">
                    <div class="col-md-3 col-sm-6 mt-2 mt-md-0">
                        <label class="label" style="font-size:15px">Planta</label>
                        <div class="input-group-prepend">
                        <span class="input-group-text bg-silver-dark-custom all-round icon-select-custom-dashboard">
                           <i class="fas fa-seedling"></i>
                        </span>
                        </div>
                        <select class="select-custom form-control form-control-sm all-round font-weight-bold"
                                id="planta_bechmark">
                            <option value="">seleccione</option>
                            @foreach($plantas as $planta)
                                <option value="{{$planta->id_planta}}">{{$planta->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-6 mt-2 mt-md-0">
                        <label class="label"  style="font-size:15px">Variedad</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-silver-dark-custom all-round icon-select-custom-dashboard">
                                <i class="fas fa-leaf"></i>
                            </span>
                        </div>
                        <select class="select-custom form-control form-control-sm all-round font-weight-bold"
                                id="id_variedad">
                            <option value="">Todas</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-6 mt-2 mt-md-0">
                        <label class="label"  style="font-size:15px">Desde</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-silver-dark-custom all-round icon-select-custom-dashboard">
                                <i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                        <select class="select-custom form-control form-control-sm all-round font-weight-bold" id="desde">
                            @foreach($semanas as $x =>  $semana)
                                <option {{count($semanas) <= 8 ? (($x+1)==count($semanas) ? 'selected':'') : (count($semanas)-4) == ($x+1) ? 'selected' : ''}}
                                    value="{{$semana->semana}}">{{$semana->semana}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-6 mt-2 mt-md-0">
                        <label class="label" style="font-size:15px">Hasta</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-silver-dark-custom all-round icon-select-custom-dashboard">
                                <i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                        <select class="select-custom form-control form-control-sm all-round font-weight-bold"
                                id="hasta">
                            @foreach($semanas as $x => $semana)
                                <option {{$x==0 ? 'selected' : ''}}
                                    value="{{$semana->semana}}">{{$semana->semana}}</option>
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

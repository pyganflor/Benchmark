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
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card-header">
            <h3 class="card-title">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-silver-dark-custom all-round icon-select-custom">
                            <i class="fas fa-seedling"></i>
                        </span>
                    </div>
                    <select class="select-custom form-control form-control-sm all-round font-weight-bold" style=" width: 295px;">
                        <option value="">Variedad</option>
                    </select>
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
        <div class="card-body p-0 w-100 ">
            <table id="example1" class="table table-bordered ">
                <thead>
                <tr>
                    <th>Indicadores</th>
                    <th>Semana 1</th>
                    <th>Semana 2</th>
                    <th>Semana 3</th>
                    <th>Semana 4</th>
                    <th>Semana 5</th>
                    <th>Semana 6</th>
                    <th>Semana 7</th>
                    <th>Semana 8</th>
                    <th>Semana 9</th>
                </tr>
                </thead>
                <tbody class="bg-gradient-white">
                <tr>
                    <td>
                        Ventas totales
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Área</td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Tallos</td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Cosechados</td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Cajas</td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Exportados</td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Calibre</td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                    <td class="text-center bg-indicadores-custom">
                        <div class="width-div-span">
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                                25.56%
                            </span>
                        </div>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th>Indicadores</th>
                    <th>Semana 1</th>
                    <th>Semana 2</th>
                    <th>Semana 3</th>
                    <th>Semana 4</th>
                    <th>Semana 5</th>
                    <th >Semana 6</th>
                    <th >Semana 7</th>
                    <th >Semana 8</th>
                    <th >Semana 9</th>

                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

@section('custom_script')
    @include('benchmark.script')
@endsection

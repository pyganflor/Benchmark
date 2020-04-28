<div class="row">
    <div class="col-12 font-weight-bold " style="font-size: 1.5rem">Indicadores <small>(Promedio últimas 4 semanas)</small></div>
    <div class="card bg-gradient-white card-indicadores col-md col-sm-6 text-center ml-md-2 mr-md-2 ml-sm-0 mr-sm-0"
         onclick="indicador(3)">
        <span class="mt-3 nombre_indicador">Precio ramo</span>
        <hr class="w-75 p-0" style="margin: 0 auto;" />
        <span class="font-weight-bold " >
            <span class="numero-indicador">{{$promIndicadoresFinca->ramos > 0 ? (number_format(($promIndicadoresFinca->dinero/$promIndicadoresFinca->ramos),2)) : 0}}</span>
            <small>(Finca)</small>
        </span>
        <small>Promedio: <b>{{$indicadores->ramos > 0 ? (number_format(($indicadores->dinero/$indicadores->ramos),2)) : 0}}</b></small>
        <small>Mejor: <b>{{$indicadores->max_ramos >0 ? (number_format(($indicadores->max_dinero/$indicadores->max_ramos),2)) : 0}}</b></small>
        <span style="color:#00B388"> Ver mas <i class="far fa-arrow-alt-circle-right"></i></span>
    </div>
    <div class="card bg-gradient-white card-indicadores col-md col-sm-6 text-center ml-md-2 mr-md-2 ml-sm-0 mr-sm-0"
         onclick="indicador(4)">
        <span class="mt-3 nombre_indicador">Precio tallo</span>
        <hr class="w-75 p-0" style="margin: 0 auto;" />
        <span class="font-weight-bold " >
            <span class="numero-indicador">{{number_format($promIndicadoresFinca->precio_tallo,2)}}</span><small>(Finca)</small>
        </span>
        <small>Promedio: <b>{{number_format(($indicadores->precio_tallo),2)}}</b></small>
        <small>Mejor: <b>{{number_format(($indicadores->max_precio_tallo),2)}}</b></small>
        <span style="color:#00B388"> Ver mas <i class="far fa-arrow-alt-circle-right"></i></span>
    </div>
    <div class="card bg-gradient-white card-indicadores col-md col-sm-6 offset-sm-3 offset-md-0 text-center ml-md-2 mr-md-2 ml-sm-0 mr-sm-0"
         onclick="indicador(5)">
        <span class="mt-3 nombre_indicador">Productividad</span>
        <hr class="w-75 p-0" style="margin: 0 auto;" />
        <span class="font-weight-bold " >
            <span class="numero-indicador">{{$promIndicadoresFinca->area > 0 ? (number_format((($promIndicadoresFinca->ramos/$promIndicadoresFinca->area)*$promIndicadoresFinca->ciclo_anno),2)) : 0}}</span><small>(Finca)</small>
        </span>
        <small>Promedio: <b>{{$indicadores->area > 0 ? (number_format((($indicadores->ramos/$indicadores->area)*$indicadores->ciclo_anno),2)) : 0}}</b></small>
        <small>Mejor: <b>{{$indicadores->max_area >0 ? (number_format((($indicadores->max_ramos/$indicadores->max_area)*$indicadores->max_ciclo_anno),2)) : 0}}</b></small>
        <span style="color:#00B388"> Ver mas <i class="far fa-arrow-alt-circle-right"></i></span>
    </div>
    <div class="card bg-gradient-white card-indicadores col-md col-sm-6 offset-sm-3 offset-md-0 text-center ml-md-2 mr-md-2 ml-sm-0 mr-sm-0"
         onclick="indicador(6)">
        <span class="mt-3 nombre_indicador">Tallos x m<sup>2</sup></span>
        <hr class="w-75 p-0" style="margin: 0 auto;" />
        <span class="font-weight-bold " >
            <span class="numero-indicador">{{number_format($promIndicadoresFinca->tallos_m_cuadrado,2)}}</span><small>(Finca)</small>
        </span>
        <small>Promedio: <b>{{number_format($indicadores->tallos_m_cuadrado,2)}}</b></small>
        <small>Mejor: <b>{{number_format($indicadores->max_tallos_m_cuadrado,2)}}</b></small>
        <span style="color:#00B388"> Ver mas <i class="far fa-arrow-alt-circle-right"></i></span>
    </div>
    <div class="card bg-gradient-white card-indicadores col-md col-sm-6 text-center ml-md-2 mr-md-2 ml-sm-0 mr-sm-0"
         onclick="indicador(2)">
        <span class="mt-3 nombre_indicador">Ciclo</span>
        <hr class="w-75 p-0" style="margin: 0 auto;" />
        <span class="font-weight-bold " >
            <span class="numero-indicador">{{number_format($promIndicadoresFinca->ciclo,2)}}</span><small>(Finca)</small>
        </span>
        <small>Promedio:  <b>{{number_format($indicadores->ciclo,2)}}</b></small>
        <small>Mejor: <b>{{number_format($indicadores->min_ciclo,2)}}</b></small>
        <span style="color:#00B388"> Ver mas <i class="far fa-arrow-alt-circle-right"></i></span>
    </div>
    <div class="card bg-gradient-white card-indicadores col-md col-sm-6 text-center ml-md-2 mr-md-2 ml-sm-0 mr-sm-0"
         onclick="indicador(1)">
        <span class="mt-3 nombre_indicador">Calibre</span>
        <hr class="w-75 p-0" style="margin: 0 auto;" />
        <span class="font-weight-bold " >
            <span class="numero-indicador">{{number_format($promIndicadoresFinca->calibre,2)}}</span><small>(Finca)</small>
        </span>
        <small>Promedio: <b>{{number_format($indicadores->calibre,2)}}</b></small>
        <small>Mejor: <b>{{number_format($indicadores->min_calibre,2)}}</b></small>
        <span style="color:#00B388" >
            Ver mas <i class="far fa-arrow-alt-circle-right"></i>
        </span>
    </div>
</div>
<div class="row">
    <form id="form_excel" method="post" action="{{url('benchmark/excel_dashboard')}}">
        {{@csrf_field()}}
        <input type="hidden" name="img_b64" id="img_b64">
        <div class="col-12 font-weight-bold " style="font-size: 1.5rem">
            Gráficas
            <buttom type="buttom" class="btn btn-sm btn-green-custom bnt-round m-1 d-none"
                    id="btn_descarga_grafica" style="cursor: pointer"
                    onclick="$('#form_excel').submit()">
                    <i class="far fa-file-excel"></i> Descagar excel
            </buttom>
        </div>
        <div class="col-12 bg-gradient-white">
            <div class="row p-3">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md col-sm-6 mt-2 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text bg-silver-dark-custom all-round icon-select-dashboard">
                                    Indicador
                                </span>
                                </div>
                                <select class="select-custom form-control form-control-sm all-round font-weight-bold"
                                        style="margin-left: 35px;" id="indicador" name="indicador">
                                    <option value="1">Calibre</option>
                                    <option value="2">Ciclo</option>
                                    <option value="3">Precio ramo</option>
                                    <option value="4">Precio tallo</option>
                                    <option value="5">Productividad</option>
                                    <option value="6">Tallos m2</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md col-sm-6 mt-2 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text bg-silver-dark-custom all-round icon-select-dashboard">
                                    Planta
                                </span>
                                </div>
                                <select class="select-custom form-control form-control-sm all-round font-weight-bold"
                                        style="margin-left: 25px;" onchange="planta_dashboard()" id="id_planta" name="id_planta">
                                    @foreach($plantas as $planta)
                                    <option value="{{$planta->id_planta}}">{{$planta->nombre}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md col-sm-6 mt-2 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text bg-silver-dark-custom all-round icon-select-dashboard">
                                    Variedad
                                </span>
                                </div>
                                <select class="select-custom form-control form-control-sm all-round font-weight-bold"
                                        id="id_variedad" name="id_variedad" style="margin-left: 30px;">
                                </select>
                            </div>
                        </div>
                        <div class="col-md col-sm-6 mt-2 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text bg-silver-dark-custom all-round icon-select-dashboard">
                                    Desde
                                </span>
                                </div>
                                <select class="select-custom form-control form-control-sm all-round font-weight-bold"
                                        style="margin-left: 35px;" id="desde" name="desde">
                                    @foreach($semanas as $x =>  $semana)
                                        <option {{count($semanas) <= 8 ? (($x+1)==count($semanas) ? 'selected':'') : (count($semanas)-4) == ($x+1) ? 'selected' : ''}}
                                                value="{{$semana->semana}}">{{$semana->semana}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md col-sm-6 mt-2 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text bg-silver-dark-custom all-round icon-select-dashboard">
                                    Hasta
                                </span>
                                </div>
                                <select class="select-custom form-control form-control-sm all-round font-weight-bold"
                                        style="margin-left: 35px;" id="hasta" name="hasta">
                                    @foreach($semanas as $x => $semana)
                                        <option {{$x==0 ? 'selected' : ''}}
                                                value="{{$semana->semana}}">{{$semana->semana}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-6 mt-2 mb-2 text-center">
                            <button type="button" class="btn btn-sm btn-green-custom bnt-round p-1"
                                    onclick="indicador_grafico()">
                                Buscar <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-8" id="div_grafica"></div>
                <div class="col-md-4">
                    <div class="card mt-4">
                        <div class="card shadow text-center bg-green-card-dashboard p-2" >
                            <i class="far fa-calendar-alt"> <span style="font-family: sans-serif;">Semana {{isset($ultimaSemanaIndicador) ? $ultimaSemanaIndicador->semana : ''}}</span></i>
                        </div>
                        <div class="mt-3 p-3">
                            <table class="w-100 font-weight-bold ">
                                <tr>
                                    <td>Calibre</td>
                                    <td class="text-center">{{isset($ultimaSemanaIndicador) ? (number_format($ultimaSemanaIndicador->calibre,2)) : 0}}</td>
                                </tr>
                                <tr>
                                    <td>Ciclo</td>
                                    <td class="text-center">{{isset($ultimaSemanaIndicador) ? (number_format($ultimaSemanaIndicador->ciclo,2))  : 0}}</td>
                                </tr>
                                <tr>
                                    <td>Precio ramo</td>
                                    <td class="text-center">{{isset($ultimaSemanaIndicador) ? ($ultimaSemanaIndicador->ramos > 0 ? number_format($ultimaSemanaIndicador->venta/$ultimaSemanaIndicador->ramos,2) : 0) : 0}}</td>
                                </tr>
                                <tr>
                                    <td>Precio tallo</td>
                                    <td class="text-center">{{isset($ultimaSemanaIndicador) ? number_format($ultimaSemanaIndicador->precio_tallo,2) : 0}}</td>
                                </tr>
                                <tr>
                                    <td>Productividad</td>
                                    <td class="text-center">{{isset($ultimaSemanaIndicador) ? ($ultimaSemanaIndicador->area > 0 ? number_format(($ultimaSemanaIndicador->ramos/$ultimaSemanaIndicador->area)*$ultimaSemanaIndicador->ciclo_anno,2) :0) : 0}}</td>
                                </tr>
                                <tr>
                                    <td>Tallos x m<sup>2</sup></td>
                                    <td class="text-center">{{isset($ultimaSemanaIndicador) ? (number_format($ultimaSemanaIndicador->tallos_m_cuadrado,2)) : 0}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    planta_dashboard();
</script>

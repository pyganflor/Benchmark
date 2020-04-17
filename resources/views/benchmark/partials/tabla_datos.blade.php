<table id="example1" class="table table-bordered">
    <thead>
    <tr>
        <th>Indicadores</th>
        @foreach($semanas as $semana)
            <th>Semana {{$semana}}</th>
        @endforeach
    </tr>
    </thead>
    <tbody class="bg-gradient-white" id="datos_benchamark">
        <tr>
            <td style="font-size: 15px;">
                Precio ramo
            </td>
            @foreach($semanas as $semana)
                <td class="text-center bg-indicadores-custom">
                <div class="width-div-span">
                    @if(isset($datos['precio_ramo'][$semana]['finca']))
                        <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                           ${{number_format($datos['precio_ramo'][$semana]['finca'],2,",",'.')}}
                        </span>
                        <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                            ${{number_format($datos['precio_ramo'][$semana]['prom'],2,",",'.')}}
                        </span>
                        <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                            ${{number_format($datos['precio_ramo'][$semana]['max'],2,",",'.')}}
                        </span>
                    @else
                        No ingresado
                    @endif
                </div>
            </td>
            @endforeach
        </tr>
        <tr>
            <td style="font-size: 15px;">Precio tallo</td>
            @foreach($semanas as $semana)
                <td class="text-center bg-indicadores-custom">
                    <div class="width-div-span">
                        @if(isset($datos['precio_tallo'][$semana]['finca']))
                            <span class="badge badge-pill indicador1-custom bnt-round m-1 p-1">
                           ${{number_format($datos['precio_tallo'][$semana]['finca'],2,",",'.')}}
                        </span>
                            <span class="badge badge-pill indicador2-custom bnt-round m-1 p-1">
                            ${{number_format($datos['precio_tallo'][$semana]['prom'],2,",",'.')}}
                        </span>
                            <span class="badge badge-pill indicador3-custom bnt-round m-1 p-1">
                            ${{number_format($datos['precio_tallo'][$semana]['max'],2,",",'.')}}
                        </span>
                        @else
                            No ingresado
                        @endif
                    </div>
                </td>
            @endforeach
        </tr>
        <tr>
            <td style="font-size: 15px;">Tallos x m<sup>2</sup></td>
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
            <td style="font-size: 15px;">Productividad</td>
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
            <td style="font-size: 15px;">Ciclo </td>
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
            <td style="font-size: 15px;">Calibre</td>
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
            @foreach($semanas as $semana)
                <th>Semana {{$semana}}</th>
            @endforeach
        </tr>
    </tfoot>
</table>
<script>
    $(function () {
        $("#example1").DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": false,
            "scrollX": true,
            "language": {
                "paginate": {
                    first:    'Inicio',
                    previous: 'Anterior',
                    next:     'Siguiente',
                    last:     'Último'
                },
                "infoEmpty": "No se encontraron registros",
                "loadingRecords": "Cargando datos...",
                "sSearch":         "Buscar:",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sLoadingRecords": "Cargando...",
                "sZeroRecords":    "No se encontraron resultados",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sLengthMenu":     "Mostrar _MENU_ registros",
            },
            fixedColumns: {
                leftColumns: 1
            }
        });
    });
</script>

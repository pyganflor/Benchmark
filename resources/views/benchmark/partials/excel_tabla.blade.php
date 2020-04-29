<table style="text-align:center">
    <tr><td></td></tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="8" style="text-align: center;font-size:16px">
            <b>Tabla Benchmark {{now()->format('d-m-Y')}}</b>
        </td>
    </tr>
    <tr><td></td></tr>
    <tr>
        <td></td>
        <td><b>Indicadores</b></td>
        @foreach($semanas as $semana)
            <td colspan="3" style="text-align: center;font-size:13px"><b>Semana {{$semana}}</b></td>
        @endforeach
    </tr>
    <tr>
        <td></td>
        <td style="border:1px solid black"><b>Precio tallo</b></td>
        @foreach($semanas as $semana)
            @if(isset($datos['precio_tallo'][$semana]['finca']))
                <td style="text-align: center;background: #00b388;color:#fff">
                    {{number_format($datos['precio_tallo'][$semana]['finca'],2,",",'.')}}
                </td>
                <td style="text-align: center;background: #0083b3;color:#fff">
                    {{number_format($datos['precio_tallo'][$semana]['prom'],2,",",'.')}}
                </td>
                <td style="text-align: center;background: #7500b3;color:#fff">
                    {{number_format($datos['precio_tallo'][$semana]['max'],2,",",'.')}}
                </td>
            @else
                 <td colspan="3" style="text-align: center">
                     No ingresado
                 </td>
            @endif
        @endforeach
    </tr>
    <tr>
        <td></td>
        <td style="border:1px solid black"><b>Precio ramo</b></td>
        @foreach($semanas as $semana)
            @if(isset($datos['precio_ramo'][$semana]['finca']))
                <td style="text-align: center;background: #00b388;color:#fff">
                    {{number_format($datos['precio_ramo'][$semana]['finca'],2,",",'.')}}
                </td>
                <td style="text-align: center;background: #0083b3;color:#fff">
                    {{number_format($datos['precio_ramo'][$semana]['prom'],2,",",'.')}}
                </td>
                <td style="text-align: center;background: #7500b3;color:#fff">
                    {{number_format($datos['precio_ramo'][$semana]['max'],2,",",'.')}}
                </td>
            @else
                <td colspan="3" style="text-align: center">
                    No ingresado
                </td>
            @endif
        @endforeach
    </tr>
    <tr>
        <td></td>
        <td style="border:1px solid black"><b>Productividad</b></td>
        @foreach($semanas as $semana)
            @if(isset($datos['productividad'][$semana]['finca']))
                <td style="text-align: center;background: #00b388;color:#fff">
                    {{number_format($datos['productividad'][$semana]['finca'],2,",",'.')}}
                </td>
                <td style="text-align: center;background: #0083b3;color:#fff">
                    {{number_format($datos['productividad'][$semana]['prom'],2,",",'.')}}
                </td>
                <td style="text-align: center;background: #7500b3;color:#fff">
                    {{number_format($datos['productividad'][$semana]['max'],2,",",'.')}}
                </td>
            @else
                <td colspan="3" style="text-align: center">
                    No ingresado
                </td>
            @endif
        @endforeach
    </tr>
    <tr>
        <td></td>
        <td style="border:1px solid black"><b>Tallos x m2</b></td>
        @foreach($semanas as $semana)
            @if(isset($datos['tallos_x_mts2'][$semana]['finca']))
                <td style="text-align: center;background: #00b388;color:#fff">
                    {{number_format($datos['tallos_x_mts2'][$semana]['finca'],2,",",'.')}}
                </td>
                <td style="text-align: center;background: #0083b3;color:#fff">
                    {{number_format($datos['tallos_x_mts2'][$semana]['prom'],2,",",'.')}}
                </td>
                <td style="text-align: center;background: #7500b3;color:#fff">
                    {{number_format($datos['tallos_x_mts2'][$semana]['max'],2,",",'.')}}
                </td>
            @else
                <td colspan="3" style="text-align: center">
                    No ingresado
                </td>
            @endif
        @endforeach
    </tr>
    <tr>
        <td></td>
        <td style="border:1px solid black"><b>Ciclo</b></td>
        @foreach($semanas as $semana)
            @if(isset($datos['ciclo'][$semana]['finca']))
                <td style="text-align: center;background: #00b388;color:#fff">
                    {{number_format($datos['ciclo'][$semana]['finca'],2,",",'.')}}
                </td>
                <td style="text-align: center;background: #0083b3;color:#fff">
                    {{number_format($datos['ciclo'][$semana]['prom'],2,",",'.')}}
                </td>
                <td style="text-align: center;background: #7500b3;color:#fff">
                    {{number_format($datos['ciclo'][$semana]['max'],2,",",'.')}}
                </td>
            @else
                <td colspan="3" style="text-align: center">
                    No ingresado
                </td>
            @endif
        @endforeach
    </tr>
    <tr>
        <td></td>
        <td style="border:1px solid black"><b>Calibre</b></td>
        @foreach($semanas as $semana)
            @if(isset($datos['calibre'][$semana]['finca']))
                <td style="text-align: center;background: #00b388;color:#fff">
                    {{number_format($datos['calibre'][$semana]['finca'],2,",",'.')}}
                </td>
                <td style="text-align: center;background: #0083b3;color:#fff">
                    {{number_format($datos['calibre'][$semana]['prom'],2,",",'.')}}
                </td>
                <td style="text-align: center;background: #7500b3;color:#fff">
                    {{number_format($datos['calibre'][$semana]['max'],2,",",'.')}}
                </td>
            @else
                <td colspan="3" style="text-align: center">
                    No ingresado
                </td>
            @endif
        @endforeach
    </tr>
    <tr>
        <td colspan="27"></td>
    </tr>
    <tr>
        <td></td>
        <td style="text-align:center"><b>Leyenda</b></td>
        <td></td>
        <td><b>Finca:</b></td>
        <td style="background: #00b388"></td>
        <td></td>
        <td><b>Promedio:</b></td>
        <td style="background: #0083b3"></td>
        <td></td>
        <td><b>Mejor:</b></td>
        <td style="background: #7500b3"></td>
    </tr>
</table>

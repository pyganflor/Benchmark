<table>
    <tr>
        <td colspan="27"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" style="text-align: center;font-size: 15px">Precio ramo</td>
        <td></td>
        <td colspan="2" style="text-align: center;font-size: 15px">Precio tallo</td>
        <td></td>
        <td colspan="2" style="text-align: center;font-size: 15px">Productividad</td>
        <td></td>
        <td colspan="2" style="text-align: center;font-size: 15px">Tallos x m2</td>
        <td></td>
        <td colspan="3" style="text-align: center;font-size: 15px">Ciclo</td>
        <td></td>
        <td colspan="2" style="text-align: center;font-size: 15px">Calibre</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" rowspan="4" style="text-align: center;vertical-align: top;font-size: 13px">
            {{$promIndicadoresFinca->ramos > 0 ? (number_format(($promIndicadoresFinca->dinero/$promIndicadoresFinca->ramos),2)) : 0}} (Finca)
            <br />
            Promedio: <b>{{$indicadores->ramos > 0 ? (number_format(($indicadores->dinero/$indicadores->ramos),2)) : 0}}</b>
            <br />
            Mejor: <b>{{$indicadores->max_ramos >0 ? (number_format(($indicadores->max_dinero/$indicadores->max_ramos),2)) : 0}}</b>
        </td>
        <td></td>
        <td colspan="2" rowspan="4" style="text-align: center;vertical-align: top;font-size: 13px">
            {{number_format($promIndicadoresFinca->precio_tallo,2)}} (Finca)
            <br />
            Promedio: <b>{{number_format(($indicadores->precio_tallo),2)}}</b>
            <br />
            Mejor: <b>{{number_format(($indicadores->max_precio_tallo),2)}}</b>
        </td>
        <td></td>
        <td colspan="2" rowspan="4" style="text-align: center;vertical-align: top;font-size: 13px">
            {{$promIndicadoresFinca->area > 0 ? (number_format((($promIndicadoresFinca->ramos/$promIndicadoresFinca->area)*$promIndicadoresFinca->ciclo_anno),2)) : 0}} (Finca)
            <br />
            Promedio: <b>{{$indicadores->area > 0 ? (number_format((($indicadores->ramos/$indicadores->area)*$indicadores->ciclo_anno),2)) : 0}}</b>
            <br />
            Mejor: <b>{{$indicadores->max_area >0 ? (number_format((($indicadores->max_ramos/$indicadores->max_area)*$indicadores->max_ciclo_anno),2)) : 0}}</b>
        </td>
        <td></td>
        <td colspan="2" rowspan="4" style="text-align: center;vertical-align: top;font-size: 13px">
            {{number_format($promIndicadoresFinca->tallos_m_cuadrado,2)}} (Finca)
            <br />
            Promedio: <b>{{number_format($indicadores->tallos_m_cuadrado,2)}}</b>
            <br />
            Mejor: <b>{{number_format($indicadores->max_tallos_m_cuadrado,2)}}</b>
        </td>
        <td></td>
        <td colspan="3" rowspan="4" style="text-align: center;vertical-align: top;font-size: 13px">
            {{number_format($promIndicadoresFinca->ciclo,2)}} (Finca)
            <br />
            Promedio: <b>{{number_format($indicadores->ciclo,2)}}</b>
            <br />
            Mejor: <b>{{number_format($indicadores->min_ciclo,2)}}</b>
        </td>
        <td></td>
        <td colspan="2" rowspan="4" style="text-align: center;vertical-align: top;font-size: 13px">
            {{number_format($promIndicadoresFinca->calibre,2)}} (Finca)
            <br />
            Promedio: <b>{{number_format($indicadores->calibre,2)}}</b>
            <br />
            Mejor: <b>{{number_format($indicadores->min_calibre,2)}}</b>
        </td>
    </tr>
    <tr><td colspan="27"></td></tr>
    <tr><td colspan="27"></td></tr>
</table>
<table>
    <tr><td colspan="27" rowspan="2"></td></tr>
    <tr><td colspan="27" rowspan="2"></td></tr>
    <tr>
        <td></td>
        <td colspan="12" rowspan="15"></td>
        <td></td>
        <td colspan="4" style="font-size: 16px;text-align:center;">
            <b>Semana {{isset($ultimaSemanaIndicador) ? $ultimaSemanaIndicador->semana : ''}}</b>
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td colspan="3" style="font-size: 15px"> Calibre</td>
        <td style="text-align: center;font-size: 15px">
            {{isset($ultimaSemanaIndicador) ? (number_format($ultimaSemanaIndicador->calibre,2)) : 0}}
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td colspan="3" style="font-size: 15px"> Ciclo</td>
        <td style="font-size: 15px;text-align: center;">
            {{isset($ultimaSemanaIndicador) ? (number_format($ultimaSemanaIndicador->ciclo,2))  : 0}}
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td colspan="3" style="font-size: 15px"> Precio por ramo </td>
        <td style="font-size: 15px;text-align: center;">
            {{isset($ultimaSemanaIndicador) ? ($ultimaSemanaIndicador->ramos > 0 ? number_format($ultimaSemanaIndicador->venta/$ultimaSemanaIndicador->ramos,2) : 0) : 0}}
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td colspan="3" style="font-size: 15px"> Precio por tallo</td>
        <td style="font-size: 15px;text-align: center;">
            {{isset($ultimaSemanaIndicador) ? number_format($ultimaSemanaIndicador->precio_tallo,2) : 0}}
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td colspan="3" style="font-size: 15px"> Productividad</td>
        <td style="font-size: 15px;text-align: center;">
            {{isset($ultimaSemanaIndicador) ? ($ultimaSemanaIndicador->area > 0 ? number_format(($ultimaSemanaIndicador->ramos/$ultimaSemanaIndicador->area)*$ultimaSemanaIndicador->ciclo_anno,2) :0) : 0}}
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td colspan="3" style="font-size: 15px"> Tallos x m2 </td>
        <td  style="font-size: 15px;text-align: center;">
            {{isset($ultimaSemanaIndicador) ? (number_format($ultimaSemanaIndicador->tallos_m_cuadrado,2)) : 0}}
        </td>
    </tr>
</table>

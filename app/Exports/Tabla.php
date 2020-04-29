<?php

namespace App\Exports;

use App\Http\Controllers\DashboardController;
use App\Modelos\DatosFinca;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class Tabla implements FromView, ShouldAutoSize
{

    public function __construct($data)
    {
        $this->id_variedad = $data->id_variedad;
        $this->desde = $data->desde;
        $this->hasta = $data->hasta;
    }


    public function view(): View
    {
        $datos = [];
        $objDatosFinca = DatosFinca::whereBetween('semana',[$this->desde,$this->hasta])
            ->where(function($query) {
                if(isset($this->id_variedad))
                    $query->where('id_variedad',$this->id_variedad);
            })->get();

        $semanas =[];
        foreach ($objDatosFinca as $semana){
            if(!in_array($semana->semana,$semanas))
                $semanas[]=$semana->semana;
        }


        foreach($objDatosFinca as $dsf){
            //precio_tallo
            $data['precio_tallo'][$dsf->semana][]= $dsf->venta/$dsf->tallos;

            //precio_ramo
            $ramos = $dsf->calibre > 0 ? $dsf->tallos/$dsf->calibre : 0;
            $data['precio_ramo'][$dsf->semana][]= $ramos>0 ? $dsf->venta/$ramos : 0;

            //ciclo
            $data['ciclo'][$dsf->semana][] = 365/$dsf->ciclo_anno;

            //tallos x mt2
            $data['tallos_x_mts2'][$dsf->semana][] = $dsf->area > 0 ? $dsf->tallos/$dsf->area : 0;

            //calibre
            $data['calibre'][$dsf->semana][] = $dsf->calibre;

            //productividad
            $data['productividad'][$dsf->semana][] = $dsf->ciclo_anno*($ramos/$dsf->area);

        }

        //SE OBTIENE EL MÁXIMO Y EL PROMEDIO
        foreach($semanas as $semana) {
            //precio_tallo
            $datos['precio_tallo'][$semana]['max'] = max($data['precio_tallo'][$semana]);
            $datos['precio_tallo'][$semana]['prom'] = array_sum($data['precio_tallo'][$semana])/count($data['precio_tallo'][$semana]);

            //precio_ramo
            $datos['precio_ramo'][$semana]['max'] = max($data['precio_ramo'][$semana]);
            $datos['precio_ramo'][$semana]['prom'] = array_sum($data['precio_ramo'][$semana])/count($data['precio_ramo'][$semana]);

            //ciclo
            $datos['ciclo'][$semana]['max'] = min($data['ciclo'][$semana]);
            $datos['ciclo'][$semana]['prom'] = array_sum($data['ciclo'][$semana])/count($data['ciclo'][$semana]);

            //tallos x mt2
            $datos['tallos_x_mts2'][$semana]['max'] = max($data['tallos_x_mts2'][$semana]);
            $datos['tallos_x_mts2'][$semana]['prom'] = array_sum($data['tallos_x_mts2'][$semana])/count($data['tallos_x_mts2'][$semana]);

            //calibre
            $datos['calibre'][$semana]['max'] = min($data['calibre'][$semana]);
            $datos['calibre'][$semana]['prom'] = array_sum($data['calibre'][$semana])/count($data['calibre'][$semana]);

            //productividad
            $datos['productividad'][$semana]['max'] = max($data['productividad'][$semana]);
            $datos['productividad'][$semana]['prom'] = array_sum($data['productividad'][$semana])/count($data['productividad'][$semana]);
        }

        //SE INGRESA EL DATO DE LA FINCA
        $datoFinca = $objDatosFinca->where('id_usuario',session('id_usuario'));

        foreach($datoFinca as $df){
            //precio_ramo
            $datos['precio_tallo'][$df->semana]['finca']= $df->venta/$df->tallos;

            //precio_ramo
            $ramos = $df->tallos/$df->calibre;
            $datos['precio_ramo'][$df->semana]['finca']=$df->venta/$ramos;

            //ciclo
            $datos['ciclo'][$df->semana]['finca']=365/$df->ciclo_anno;

            //tallos x mt2
            $datos['tallos_x_mts2'][$df->semana]['finca']=$df->tallos/$df->area;

            //calibre
            $datos['calibre'][$df->semana]['finca'] = $df->calibre;

            //productividad
            $datos['productividad'][$df->semana]['finca'] = $df->calibre > 0 ? $df->ciclo_anno*($ramos/$df->area) : 0;

        }

        sort($semanas);

        return view('benchmark.partials.excel_tabla', [
            'datos' => $datos,
            'semanas' => $semanas
        ]);
    }
}

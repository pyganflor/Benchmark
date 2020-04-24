<?php

namespace App\Http\Controllers;

use App\Modelos\DatosFinca;
use App\Modelos\Variedad;
use App\Modelos\VariedadUsuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function inicio(){
        return view('dashboard.inicio');
    }

    public function indicadores(){

        $ultimasCuatroSemanas = $this->ultimas4Semanas();

        sort($ultimasCuatroSemanas);

        $promIndicadoresFinca = DatosFinca::where('id_usuario',session('id_usuario'))
                                ->whereIn('semana',$ultimasCuatroSemanas)
                                ->select(
                                    DB::raw('AVG(tallos/area) as tallos_m_cuadrado'),
                                    DB::raw('AVG(venta/tallos) as precio_tallo'),
                                    DB::raw('AVG(365/ciclo_anno) as ciclo'),
                                    DB::raw('AVG(tallos/calibre) as ramos'),
                                    DB::raw('AVG(venta) as dinero'),
                                    DB::raw('AVG(calibre) as calibre'),
                                    DB::raw('AVG(area) as area'),
                                    DB::raw('AVG(ciclo_anno) as ciclo_anno')
                                )->first();

        $indicadores = DatosFinca::whereIn('semana',$ultimasCuatroSemanas)
            ->select(
                DB::raw('AVG(tallos/area) as tallos_m_cuadrado'),
                DB::raw('AVG(venta/tallos) as precio_tallo'),
                DB::raw('AVG(365/ciclo_anno) as ciclo'),
                DB::raw('AVG(tallos/calibre) as ramos'),
                DB::raw('AVG(venta) as dinero'),
                DB::raw('AVG(calibre) as calibre'),
                DB::raw('AVG(area) as area'),
                DB::raw('AVG(ciclo_anno) as ciclo_anno'),

                DB::raw('MAX(calibre) as max_calibre'),
                DB::raw('MAX(365/ciclo_anno) as max_ciclo'),
                DB::raw('MAX(tallos/calibre) as max_ramos'),
                DB::raw('MAX(venta) as max_dinero'),
                DB::raw('MAX(venta/tallos) as max_precio_tallo'),
                DB::raw('MAX(area) as max_area'),
                DB::raw('MAX(ciclo_anno) as max_ciclo_anno'),
                DB::raw('MAX(tallos/area) as max_tallos_m_cuadrado')
            )->first();

        $ultimaSemanaIndicador = DatosFinca::where([
            ['id_usuario',session('id_usuario')],
            ['semana',end($ultimasCuatroSemanas)]
        ])->select('calibre','ciclo_anno','area','semana','venta',
            DB::raw('(365/ciclo_anno) as ciclo'),
            DB::raw('(tallos/calibre) as ramos'),
            DB::raw('(venta/tallos) as precio_tallo'),
            DB::raw('(tallos/area) as tallos_m_cuadrado')
        )->first();

        return view('dashboard.partials.indicadores',[
            'promIndicadoresFinca' => $promIndicadoresFinca,
            'indicadores' => $indicadores,
            'ultimaSemanaIndicador' => $ultimaSemanaIndicador,
            'semanas'=> DatosFinca::where('id_usuario',session('id_usuario'))->select('semana')
                            ->orderBy('semana','desc')->distinct()->get(),
            'plantas' => VariedadUsuario::where([
                ['variedad_usuario.id_usuario',session('id_usuario')],
                ['variedad_usuario.estado',true]
            ])->join('variedad as v','variedad_usuario.id_variedad','v.id_variedad')
                ->join('planta as p','v.id_planta','p.id_planta')
                ->join('datos_finca as df','v.id_variedad','df.id_variedad')
                ->select('p.id_planta','p.nombre')->distinct()->get()
        ]);
    }

    public function vistaIndicador(Request $request){

        $ultimasCuatroSemanas = $this->ultimas4Semanas();
        $objDatosFinca = DatosFinca::whereIn('semana',$ultimasCuatroSemanas)
            ->where('id_usuario',session('id_usuario'))->get();
        $datos=[];

        foreach ($objDatosFinca as $d) {
            $datos['semanas'][]='Semana '.$d->semana;
            if($request->indicador == 1){
                $datos['datos'][] = $d->calibre;
            }else if($request->indicador == 2){
                $datos['datos'][] = number_format((365/$d->ciclo_anno),2);
            }else if($request->indicador == 3){
                $ramos = $d->tallos/$d->calibre;
                $datos['datos'][] = number_format(($d->venta/$ramos),2);
            }else if($request->indicador == 4){
                $datos['datos'][] = number_format(($d->venta/$d->tallos),2);
            }else if($request->indicador == 5){
                $ramos = $d->tallos/$d->calibre;
                $datos['datos'][] = number_format((($ramos/$d->area)*$d->ciclo_anno),2);
            }else if($request->indicador == 6){
                $datos['datos'][] = number_format(($d->tallos/$d->area),2);
            }
        }

        return view('dashboard.partials.tabla_indicador',[
            'data' => $datos
        ]);
    }

    public function grafica(Request $request){

        $objDatosFinca = DatosFinca::whereBetween('semana',[$request->desde,$request->hasta])
            ->where('id_variedad',$request->id_variedad)->get();
        $datos=[];
        $arrData = [];

        if ($request->indicador == 1) {
            foreach ($objDatosFinca as $data)
                $arrData[$data->semana][]=$data->calibre;
        }elseif ($request->indicador == 2) {
            foreach ($objDatosFinca as $data)
                $arrData[$data->semana][]= 365/$data->ciclo_anno;
        }elseif ($request->indicador == 3) {
            foreach ($objDatosFinca as $data){
                $ramos = $data->tallos/$data->calibre;
                $arrData[$data->semana][]=$data->venta/$ramos;
            }
        }elseif ($request->indicador == 4) {
            foreach ($objDatosFinca as $data){
                $arrData[$data->semana][]=$data->venta/$data->tallos;
            }
        }elseif ($request->indicador == 5) {
            foreach ($objDatosFinca as $data){
                $ramos = $data->tallos / $data->calibre;
                $arrData[$data->semana][]= number_format((($ramos / $data->area) * $data->ciclo_anno), 2);
            }
        }elseif ($request->indicador == 6) {
            foreach ($objDatosFinca as $data)
                $arrData[$data->semana][]= number_format(($data->tallos / $data->area), 2);
        }

        foreach ($arrData as $semana => $item) {
            $datos['prom'][] = number_format((array_sum($item)/count($item)),2);
            $datos['max'][] = number_format(max($item),2);
        }

        //Se agrega el dato de la finca
        $objDatosFinca = $objDatosFinca->where('id_usuario',session('id_usuario'));
        foreach ($objDatosFinca as $d) {
            $datos['semanas'][] = 'Semana ' . $d->semana;
            if ($request->indicador == 1) {
                $datos['finca'][] = $d->calibre;
            } else if ($request->indicador == 2) {
                $datos['finca'][] = number_format((365 / $d->ciclo_anno), 2);
            } else if ($request->indicador == 3) {
                $ramos = $d->tallos / $d->calibre;
                $datos['finca'][] = number_format(($d->venta / $ramos), 2);
            } else if ($request->indicador == 4) {
                $datos['finca'][] = number_format(($d->venta / $d->tallos), 2);
            } else if ($request->indicador == 5) {
                $ramos = $d->tallos / $d->calibre;
                $datos['finca'][] = number_format((($ramos / $d->area) * $d->ciclo_anno), 2);
            } else if ($request->indicador == 6) {
                $datos['finca'][] = number_format(($d->tallos / $d->area), 2);
            }
        }

        return view('dashboard.partials.graficas',[
            'datos' => $datos
        ]);
    }

    public function ultimas4Semanas(){
        return DatosFinca::where('id_usuario',session('id_usuario'))->orderBy('semana','desc')
            ->select('semana')->distinct()->take(4)->pluck('semana')->toArray();
    }
}

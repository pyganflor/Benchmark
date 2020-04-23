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

        $promIndicadores = DatosFinca::where('id_usuario',session('id_usuario'))
                                ->whereIn('semana',$ultimasCuatroSemanas)
                                ->select(
                                    DB::raw('avg(tallos/area) as tallos_m_cuadrado'),
                                    DB::raw('avg(venta/tallos) as precio_tallo'),
                                    DB::raw('avg(365/ciclo_anno) as ciclo'),
                                    DB::raw('avg(tallos/calibre) as ramos'),
                                    DB::raw('avg(venta) as dinero'),
                                    DB::raw('avg(calibre) as calibre'),
                                    DB::raw('avg(area) as area'),
                                    DB::raw('avg(ciclo_anno) as ciclo_anno')
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
            'promIndicadores' => $promIndicadores,
            'ultimaSemanaIndicador' => $ultimaSemanaIndicador,
            'semanas'=> DatosFinca::select('semana')->orderBy('semana','desc')->distinct()->get(),
            'plantas' => VariedadUsuario::where([
                ['variedad_usuario.id_usuario',session('id_usuario')],
                ['variedad_usuario.estado',true]
            ])->join('variedad as v','variedad_usuario.id_variedad','v.id_variedad')
                ->join('planta as p','v.id_planta','p.id_planta')
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

    public function ultimas4Semanas(){
        return DatosFinca::where('id_usuario',session('id_usuario'))->orderBy('semana','desc')
            ->select('semana')->distinct()->take(4)->pluck('semana')->toArray();
    }
}

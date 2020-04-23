<?php

namespace App\Http\Controllers;

use App\Modelos\DatosFinca;
use App\Modelos\Variedad;
use App\Modelos\VariedadUsuario;
use Illuminate\Http\Request;
use App\Modelos\Planta;
use App\Imports\DataExcel;
use Carbon\Carbon;
use Validator;

class BenchmarkController extends Controller
{
    public function inicio(){
        return view('benchmark.inicio',[
            'semanas'=> DatosFinca::select('semana')->orderBy('semana','desc')->distinct()->get(),
            'plantas' => VariedadUsuario::where([
                ['variedad_usuario.id_usuario',session('id_usuario')],
                ['variedad_usuario.estado',true]
            ])->join('variedad as v','variedad_usuario.id_variedad','v.id_variedad')
                ->join('planta as p','v.id_planta','p.id_planta')
                ->select('p.id_planta','p.nombre')->distinct()->get()
        ]);
    }

    public function tabla(Request $request){

        $datos = [];
        $objDatosFinca = DatosFinca::whereBetween('semana',[$request->desde,$request->hasta])
                            ->where(function($query) use ($request){
                                if(isset($request->id_variedad))
                                    $query->where('id_variedad',$request->id_variedad);
                            })->get();

        $semanas =[];
        foreach ($objDatosFinca as $semana){
            if(!in_array($semana->semana,$semanas))
                $semanas[]=$semana->semana;
        }

        $data =[];
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

            /*$semanasPasadas = $this->cuatroSemanasPasadas($dsf->semana);
            $sumRamos = 0;
            $sumArea = 0;
            $sumCicloAnno = 0;
            $dataUsuarioSemana =[];
            $dataFincaSemanaPasada = $objDatosFinca->whereIn('semana',$semanasPasadas);
                $dataUsuarioSemana[$item->id_usuario][$item->semana]=[
                    'tallos'=>$item->tallos,
                    'calibre' =>$item->calibre,
                    'ciclo_anno' => $item->ciclo_anno,
                    'area' => $item->area
                ];
            }*/

            /*foreach ($dataFincaSemanaPasada as $dfsp) {
                $sumRamos += ($dfsp->tallos/$dfsp->calibre);
                $sumArea+= $dfsp->area;
                $sumCicloAnno += $dfsp->ciclo_anno;
            }
            $promCicloAnno = $sumCicloAnno/count($semanasPasadas);
            dump('semana: '.$dsf->semana.' promciclo:'.$promCicloAnno. ' sumRamos: '.$sumRamos.' sumArea: '.$sumArea.' total: '.$promCicloAnno*($sumRamos/$sumArea) );
            $data['productividad'][$dsf->semana][] = $promCicloAnno*($sumRamos/$sumArea);/*$dsf->calibre> 0 ? $dsf->ciclo_anno*($ramos/$dsf->calibre) : 0;*/
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
            $datos['ciclo'][$semana]['max'] = max($data['ciclo'][$semana]);
            $datos['ciclo'][$semana]['prom'] = array_sum($data['ciclo'][$semana])/count($data['ciclo'][$semana]);

            //tallos x mt2
            $datos['tallos_x_mts2'][$semana]['max'] = max($data['tallos_x_mts2'][$semana]);
            $datos['tallos_x_mts2'][$semana]['prom'] = array_sum($data['tallos_x_mts2'][$semana])/count($data['tallos_x_mts2'][$semana]);

            //calibre
            $datos['calibre'][$semana]['max'] = max($data['calibre'][$semana]);
            $datos['calibre'][$semana]['prom'] = array_sum($data['calibre'][$semana])/count($data['calibre'][$semana]);

            //productividad
            //dump($data['productividad'][$semana]);
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

            /*$semanasPasadas = $this->cuatroSemanasPasadas($df->semana);
            $sumRamos = 0;
            $sumArea = 0;
            $sumCicloAnno = 0;
            $dataFincaSemanaPasada = $datoFinca->whereIn('semana',$semanasPasadas);
            foreach ($dataFincaSemanaPasada as $dfsp) {
                $sumRamos += ($dfsp->tallos/$dfsp->calibre);
                $sumArea+= $dfsp->area;
                $sumCicloAnno += $dfsp->ciclo_anno;
            }
            $promCicloAnno = $sumCicloAnno/count($semanasPasadas);

            $datos['productividad'][$df->semana]['finca'] = $promCicloAnno*($sumRamos/$sumArea);*/

        }

        sort($semanas);
        return view('benchmark.partials.tabla_datos',[
            'datos' => $datos,
            'semanas' => $semanas
        ]);
    }

    public function uploadFile(){
        return view('benchmark.partials.carga_archivo');
    }

    public function cargaManual(){
        return view('benchmark.partials.carga_datos_manual',[
            'plantas'=> Planta::where('estado',1)->select('id_planta','nombre')->get(),
            'semanas'=> DatosFinca::select('semana')->orderBy('semana','desc')->distinct()->get()
        ]);
    }

    public function optionsVariedades(Request $request){
        return Variedad::where([
            ['variedad.id_planta',$request->id_planta],
            ['variedad.estado',1],
            ['vu.id_usuario',session('id_usuario')]
        ])->join('variedad_usuario as vu','variedad.id_variedad','vu.id_variedad')
            ->select('variedad.id_variedad','variedad.nombre')->distinct()->get();
    }

    public function storeDataFile(Request $request){

        $importar = new DataExcel;
        $importar->import($request->file('archivo_excel'));

        if(count($importar->failures())>0){
            $success = true;
            $alert = 0;
            $msg ='<ul>';
            $msg .= '<li style="list-style: none"><b>Las siguientes columnas tuvieron errores: </b></li>';

            foreach ($importar->failures() as  $failure)
                $msg .= '<li>' .$failure->errors()[0]. ' en la fila '.$failure->row().'</li>';

            $msg .= '<li style="list-style: none"><b>Nota:</b> las filas con errores no se guardaron, si desea cargar estas filas por favor corrijalas y vuelva a cargar los datos</li>';
            $msg .= '</ul>';

        }else{
            $success = true;
            $alert = 1;
            $msg = 'Todos los datos se han ingresado exitosamente sin errores';
        }

        return [
            'success'=>$success,
            'alert'=> $alert,
            'msg'=>$msg
        ];
    }

    public function storeDataManual(Request $request){
        $valida = Validator::make($request->all(), [
            'semana' => 'required|numeric',
            'variedad' => 'required|exists:variedad,id_variedad',
            'area' => 'required|numeric',
            'tallos' => 'required|numeric',
            'cajas' => 'required|numeric',
            'calibre' => 'required|numeric',
            'ventas' => 'required|numeric',
            'ciclo_anno' =>'required|numeric',
            'variedad' => function($attribute,$value, $onFailure) use($request) {
                $variedadUsuario = VariedadUsuario::where([
                    ['id_usuario',session('id_usuario')],
                    ['id_variedad',$request->variedad]
                ])->exists();
                if (!$variedadUsuario)
                    $onFailure('La variedad no esta asignada al usuario');
            }
        ],[
            'semana.required' => 'La semana es obligatoria',
            'variedad.required' => 'La variedad es obligatoria',
            'area.required' => 'El area es obligatoria',
            'tallos.required' => 'los tallos cosechados son obligatorios',
            'cajas.required' => 'Las cajas exportadas son obligatorios',
            'calibre.required' => 'El calibre es obligatorio',
            'ventas.required' => 'Las ventas totales son obligatorias',
            'ciclo_anno.required' => 'Los ciclos por año son obligatorios',
            'semana.numeric' => 'La semana debe ser un número',
            'variedad.numeric' => 'La variedad debe ser un número',
            'area.numeric' => 'El area debe ser un número',
            'tallos.numeric' => 'los tallos cosechados son numéricos',
            'cajas.numeric' => 'Las cajas exportadas son numéricos',
            'calibre.numeric' => 'El calibre debe ser numérico',
            'ciclo_anno.numeric' => 'Los ciclos por año deben ser numérico',
            'ventas.numeric' => 'Las ventas totales debe ser numérico',
            'variedad.exists' => 'La variedad no esta registrada en la base de datos'
        ]);

        if (!$valida->fails()) {

            try{

                $objDatosFinca = DatosFinca::all()
                    ->where('id_usuario' , session('id_usuario'))
                    ->where('id_variedad' , $request->variedad)
                    ->where('semana',$request->semana)->first();

                if(!isset($objDatosFinca))
                    $objDatosFinca = new DatosFinca;

                $objDatosFinca->id_usuario = session('id_usuario');
                $objDatosFinca->semana = $request->semana;
                $objDatosFinca->id_variedad = $request->variedad;
                $objDatosFinca->area = $request->area;
                $objDatosFinca->tallos = $request->tallos;
                $objDatosFinca->cajas = $request->cajas;
                $objDatosFinca->calibre = $request->calibre;
                $objDatosFinca->venta = $request->ventas;
                $objDatosFinca->ciclo_anno = $request->ciclo_anno;
                $objDatosFinca->save();

                $success =true;
                $msg = 'Se han guardado los datos con éxito';

            }catch(\Exception $e){
                $success =false;
                $msg = 'Ha ocurrido un inconveniente crear o actualizar los datos de la finca, se describe a continuación 
                            <br/>'.$e->getMessage().'<br/> En la linea:'.$e->getLine().'<br/> del archivo: '.$e->getFile();
            }

        }else {
            $success = false;
            $errores = '';
            foreach ($valida->errors()->all() as $mi_error) {
                if ($errores == '') {
                    $errores = '<li>' . $mi_error . '</li>';
                } else {
                    $errores .= '<li>' . $mi_error . '</li>';
                }
            }
            $msg = '<div class="alert alert-danger">' .
                '<p class="text-center">¡Por favor corrija los siguientes errores!</p>' .
                '<ul class="list-unstyled">' .
                $errores .
                '</ul>' .
                '</div>';
        }
        return [
            'msg' => $msg,
            'success' => $success
        ];
    }

    public static function semanas(){

        $annoActual = now()->format('Y');
        $annoAnterior = now()->subYear()->format('Y');
        $annos = [$annoAnterior,$annoActual];

        $semanas =[];
        foreach ($annos as $a) {
            $semanasAnno = Carbon::parse($a)->weeksInYear();
            $arrAnno =str_split($a,2);
            for($i=1; $i<=$semanasAnno; $i++){
                if(strlen($i)==1)
                    $i = '0'.$i;

                $semanas[]=$arrAnno[1].$i;
            }
        }
        return $semanas;
    }

    public function cuatroSemanasPasadas($semana){
        return DatosFinca::where('semana','<=',$semana)->orderBy('semana','desc')
            ->select('semana')->distinct()->take(4)->pluck('semana');
    }
}

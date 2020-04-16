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
            'plantas' => Planta::where('estado',true)->select('nombre','id_planta')->get()
        ]);
    }

    public function tabla(){

        $objDatosFinca = '';

        return view('benchmark.partials.tabla_datos');
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
            ['id_planta',$request->id_planta],
            ['estado',1]
        ])->select('id_variedad','nombre')->get();

    }

    public function storeDataFile(Request $request){

        $importar = new DataExcel();
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
}

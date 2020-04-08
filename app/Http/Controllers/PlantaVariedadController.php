<?php

namespace App\Http\Controllers;

use App\Modelos\Planta;
use Illuminate\Http\Request;
use Validator;
use App\Modelos\Variedad;
use App\Modelos\VariedadUsuario;

class PlantaVariedadController extends Controller
{
    public function inicio(){
        return view('planta_variedad.inicio');
    }

    //GESTION PLANTAS
    public function plantas(){
        return view('planta_variedad.plantas.partials.plantas',[
            'plantas' => Planta::orderBy('estado','desc')->orderBy('nombre','asc')->get()
        ]);
    }

    public function formPlantas(Request $request){
        return view('planta_variedad.plantas.partials.form_planta',[
            'planta' => Planta::find($request->id_planta)
        ]);
    }

    public function storePlantas(Request $request){

        $valida = Validator::make($request->all(), [
            'planta' => 'required|min:1'
        ]);

        if (!$valida->fails()) {

            try{
                foreach($request->planta as $x => $planta){
                    $objPlanta = isset($planta['id_planta'])
                        ? Planta::find($planta['id_planta'])
                        : new Planta;

                    $objPlanta->nombre = $planta['nombre'];
                    $objPlanta->save();
                }

                if(count($request->planta)== $x+1){
                    $success =true;
                    $msg = 'Se ha creado la planta con éxito';
                }

            }catch(\Exception $e){
                $success =false;
                $msg = 'Ha ocurrido un inconveniente crear o actualizar la planta, se describe a continuación 
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
                '<ul>' .
                $errores .
                '</ul>' .
                '</div>';
        }
        return [
            'msg' => $msg,
            'success' => $success
        ];
    }

    public function estadoPlanta(Request $request){
        try{
            $objPlanta = Planta::find($request->id_planta);
            $objPlanta->update([
                'estado' => $request->estado ==1 ? 0 : 1
            ]);
            $success =true;
            $msg = 'Se ha actualizado el estado de la planta con éxito';
        }catch (\Exception $e){
            $success =false;
            $msg = 'Ha ocurrido un inconveniente al actualizar el estado de la planta, se describe a continuación 
                            <br/>'.$e->getMessage().'<br/> En la linea:'.$e->getLine().'<br/> del archivo: '.$e->getFile();
        }
        return [
            'msg' => $msg,
            'success' => $success
        ];
    }

    public function deletePlanta(Request $request){
        try{
            Planta::destroy($request->id_planta);
            $success =true;
            $msg = 'Se ha eliminado la planta con éxito';
        }catch(\Exception $e){
            $success =false;
            $msg = 'Ha ocurrido un inconveniente al actualizar el estado de la planta, se describe a continuación 
                            <br/>'.$e->getMessage().'<br/> En la linea:'.$e->getLine().'<br/> del archivo: '.$e->getFile();
        }
        return [
            'msg' => $msg,
            'success' => $success
        ];
    }

    //GESTION VARIEDADES
    public function variedades(){
        return view('planta_variedad.variedades.partials.variedades',[
            'variedades' => Variedad::orderBy('estado','desc')->orderBy('nombre','asc')->get()
        ]);
    }

    public function formVariedades(Request $request){
        return view('planta_variedad.variedades.partials.form_variedad',[
            'variedad' => Variedad::find($request->id_variedad),
            'plantas' => Planta::where('estado',true)->orderBy('nombre','asc')->get()
        ]);
    }

    public function storeVariedades(Request $request){

        $valida = Validator::make($request->all(), [
            'variedad' => 'required|min:1'
        ]);

        if (!$valida->fails()) {

            try{
                foreach($request->variedad as $x => $variedad){
                    $objVariedad = isset($variedad['id_variedad'])
                        ? Variedad::find($variedad['id_variedad'])
                        : new Variedad;

                    $objVariedad->id_planta = $variedad['id_planta'];
                    $objVariedad->nombre = $variedad['nombre'];
                    $objVariedad->save();
                }

                if(count($request->variedad)== $x+1){
                    $success =true;
                    $msg = 'Se ha creado la variedad con éxito';
                }

            }catch(\Exception $e){
                $success =false;
                $msg = 'Ha ocurrido un inconveniente crear o actualizar la variedad, se describe a continuación 
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
                '<ul>' .
                $errores .
                '</ul>' .
                '</div>';
        }
        return [
            'msg' => $msg,
            'success' => $success
        ];
    }

    public function estadoVariedades(Request $request){
        try{
            $objVariedad = Variedad::find($request->id_variedad);
            $objVariedad->update([
                'estado' => $request->estado ==1 ? 0 : 1
            ]);
            $success =true;
            $msg = 'Se ha actualizado el estado de la variedad con éxito';
        }catch (\Exception $e){
            $success =false;
            $msg = 'Ha ocurrido un inconveniente al actualizar el estado de la variedad, se describe a continuación 
                            <br/>'.$e->getMessage().'<br/> En la linea:'.$e->getLine().'<br/> del archivo: '.$e->getFile();
        }
        return [
            'msg' => $msg,
            'success' => $success
        ];
    }

    public function deleteVariedades(Request $request){
        try{
            Variedad::destroy($request->id_variedad);
            $success =true;
            $msg = 'Se ha eliminado la variedad con éxito';
        }catch(\Exception $e){
            $success =false;
            $msg = 'Ha ocurrido un inconveniente al actualizar el estado de la variedad, se describe a continuación 
                            <br/>'.$e->getMessage().'<br/> En la linea:'.$e->getLine().'<br/> del archivo: '.$e->getFile();
        }
        return [
            'msg' => $msg,
            'success' => $success
        ];
    }

    //GESTION ASIGANCION VARIEDADES
    public function asignaVariedades(){
        return view('planta_variedad.asignar_variedad',[
            'variedades' => Variedad::orderBy('estado','desc')->orderBy('nombre','asc')->get()
        ]);
    }

    public function storeAsignacionVariedades(Request $request){
        $valida = Validator::make($request->all(), [
            'variedad_usuario' => 'required|min:1'
        ],[
            'variedad_usuario.required' => 'No se han selecionado las variedades'
        ]);

        if (!$valida->fails()) {
            try{
                foreach ($request->variedad_usuario as $x=> $variedaUsario) {
                    $objVariedadUsuario = new VariedadUsuario;
                    $objVariedadUsuario->id_variedad = $variedaUsario['id_variedad'];
                    $objVariedadUsuario->id_usuario = session('id_usuario');
                    $objVariedadUsuario->save();
                }
                if(count($request->variedad_usuario)== $x+1){
                    $success =true;
                    $msg = 'Se ha creado la variedad con éxito';
                }
            }catch(\Exception $e){
                $success =false;
                $msg = 'Ha ocurrido un inconveniente crear o actualizar la variedad, se describe a continuación 
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
                '<ul>' .
                $errores .
                '</ul>' .
                '</div>';
        }
        return [
            'msg' => $msg,
            'success' => $success
        ];
    }
}

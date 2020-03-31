<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\EnviarAccesos;
use App\Modelos\Usuario;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Validator;

class UsuarioController extends Controller
{
    public  function inicio(){
        return view('usuario.inicio');
    }

    public function enviarCorreo(Request $request){

        $valida = Validator::make($request->all(), [
            'correo' =>'required|email'
        ], [
            'correo.required' => 'Debe ingresar un correo para enviar los accesos',
            'correo.email' => 'Debe ingresar un correo electrónico válido'
        ]);

        if (!$valida->fails()) {

            try{

                $stringUser = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $stringPass = "$%^&*)(1234567890.+-|\`!#~!<>{}[]abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

                $passRandom =  substr(str_shuffle($stringPass), 0, 8);
                $userRandom1 =  substr(str_shuffle($stringUser), 0, 3);
                $userRandom2 =  substr(str_shuffle($stringUser), 5, 3);

                $user = $userRandom1.'-'.$userRandom2;
                $passHashed = Hash::make($passRandom);

                $usuario = Usuario::create([
                    'nombre' => $user,
                    'contrasena' => $passHashed,
                    'id_rol' => $request->admin =='true' ? 1 : 2
                ]);

                if($usuario->save()){
                    $success = true;
                    $modelUSuario = $usuario = Usuario::all()->last();
                    Mail::to($request->correo)->send(new EnviarAccesos($user,$passRandom));
                    $msg = '<div class="aler alert-success w-100 text-center">Se ha enviado el correo con los e-mail con los accesos al correo ingresado</div>';
                }

            }catch(\Exception $e){

                $success=false;
                if($success && isset($modelUSuario))
                    Usuario::Destroy($modelUSuario->id_usuario);

                $msg = '<div class="aler alert-danger w-100 text-center">Ha ocurrido un inconveniente al enviar el correo, se describe a continuación 
                        <br/>'.$e->getMessage().'<br/> En la linea:'.$e->getLine().'<br/> del archivo: '.$e->getFile().' 
                    </div>';

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
            'success' => $success,
            'msg' => $msg
        ];

    }
}

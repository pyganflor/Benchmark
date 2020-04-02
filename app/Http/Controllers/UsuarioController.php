<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\EnviarAccesos;
use App\Modelos\Usuario;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\LoginController;
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
                    $msg = '<div class="alert alert-success w-100 text-center">Se ha enviado el correo con los e-mail con los accesos al correo ingresado</div>';
                }

            }catch(\Exception $e){

                $success=false;
                if($success && isset($modelUSuario))
                    Usuario::Destroy($modelUSuario->id_usuario);

                $msg = '<div class="alert alert-danger w-100 text-center">Ha ocurrido un inconveniente al enviar el correo, se describe a continuación 
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

    public function actualziaAccesos(Request $request){

        $valida = Validator::make($request->all(), [
            'contrasena' => 'required|min:8|alpha_num',
            'usuario' => 'required|min:7|'
        ], [
            'contrasena.min' => 'la contraseña debe tener mínimo 8 caracteres',
            'contrasena.required' => 'Debe ingresar la contraseña',
            'contrasena.alpha_num' => 'La contraseña debe ser letras y números',
            'usuario.min' => 'El usuario debe tener mínimo 7 caracteres',
            'usuario.required' => 'Debe ingresar el usuario'
        ]);

        if (!$valida->fails()) {
            try{
                $usuario = Usuario::where('id_usuario',session('id_usuario'));
                $usuario->update([
                    'nombre' => $request->usuario,
                    'contrasena' => Hash::make($request->contrasena)
                ]);
                $success = true;
                $msg = '<div class="alert alert-success w-100 text-center">Los accesos se han actualizado exitosamente por los ingresados</div>';

                $loginController = new LoginController;
                $loginController->logout();

            }catch(\Exception $e){
                $success=false;
                $msg = '<div class="alert alert-danger w-100 text-center">Ha ocurrido un inconveniente al actualizar los accesos, se describe a continuación 
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(){
        return view('login.inicio');
    }

    public function acceder(Request $request){

        Validator::make($request->all(), [
            'usuario' => 'required|min:7',
            'contrasena' => 'required|min:8',
            'g-recaptcha-response' => 'required|captcha'
        ],[
            'usuario.required' => 'Debe ingresar el usuario',
            'usuario.min' => 'El usuario debe ser mínimo 7 caracteres',
            'contrasena.required' => 'Debe ingresar la contraseña',
            'contrasena.min' => 'la contraseña debe tener mínimo 8 caracteres',
            'g-recaptcha-response.required' => 'El captcha es obligatorio',
            'g-recaptcha-response.captach' => 'Haga clic en el captcha mostrado'
        ])->validate();



    }
}

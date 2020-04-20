<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class Autenticado
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->has('logeado')) {
            if ($request->session()->get('logeado')) {
                if(!$request->session()->get('trash')){
                    $rutas = $this->rutasBloqueadas();
                    if(!in_array($request->path(),$rutas[session('id_rol')])){
                        return $next($request);
                    }else{
                        return new Response(view('errores.acceso_denegado'));
                    }
                }else{
                    return new Response(view('errores.usuario_inactivo'));
                }
            }
        }
        return redirect('login');
    }


    public function rutasBloqueadas(){
        return [
            1 =>[ //Administrador
                'benchmark','dashboard','/'
            ],
            2=>[ //Usuaurio (Finca)

            ],
            3=>[ //Sistemas (Super Administrador)
                'benchmark','dashboard','/'
            ]
        ];
    }
}

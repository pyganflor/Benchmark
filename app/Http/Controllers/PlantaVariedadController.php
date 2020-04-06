<?php

namespace App\Http\Controllers;

use App\Modelos\Planta;
use Illuminate\Http\Request;

class PlantaVariedadController extends Controller
{
    public function inicio(){
        return view('planta_variedad.inicio');
    }

    public function plantas(){
        return view('planta_variedad.partials.plantas',[
            'plantas' => Planta::where('estado',true)->get()
        ]);
    }

    public function formPlantas(){
        return view('planta_variedad.partials.form_planta');
    }

    public function variedades(){

    }
}

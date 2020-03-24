<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BenchmarkController extends Controller
{
    public function inicio(){
        return view('benchmark.inicio');
    }

    public function uploadFile(Request $request){

        return view('benchmark.partials.carga_archivo');

    }

    public function cargaManual(){
        return view('benchmark.partials.carga_datos_manual');
    }
}

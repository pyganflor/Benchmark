<?php

namespace App\Http\Controllers;

use App\Modelos\Variedad;
use Illuminate\Http\Request;
use App\Modelos\Planta;
use App\Imports\DataExcel;
use Maatwebsite\Excel\Facades\Excel;

class BenchmarkController extends Controller
{
    public function inicio(){
        return view('benchmark.inicio');
    }

    public function uploadFile(){
        return view('benchmark.partials.carga_archivo');
    }

    public function cargaManual(){
        return view('benchmark.partials.carga_datos_manual',[
            'plantas'=> Planta::where('estado',1)->select('id_planta','nombre')->get()
        ]);
    }

    public function optionsVariedades(Request $request){
        return Variedad::where([
            ['id_planta',$request->id_planta],
            ['estado',1]
        ])->select('id_variedad','nombre')->get();

    }

    public function storeDataFile(Request $request){
        //dd($request->all());
        Excel::Import(new DataExcel, $request->file('archivo_excel'));
    }
}

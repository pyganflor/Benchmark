<?php

namespace App\Imports;

use App\Modelos\VariedadUsuario;
use Maatwebsite\Excel\Concerns\{Importable, ToModel, WithHeadingRow, WithValidation, SkipsFailures, SkipsOnFailure};
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use App\Modelos\DatosFinca;
use App\Modelos\Variedad;
HeadingRowFormatter::default('none');

class DataExcel implements ToModel, WithValidation, SkipsOnFailure,WithHeadingRow
{
    use Importable, SkipsFailures;

    public function rules(): array
    {
        return [
            'Semana' =>'required|numeric',
            'Variedad' =>'required|exists:variedad,nombre',
            'Área' =>'required|numeric',
            'Tallos cosechados' =>'required|numeric',
            'Cajas exportadas' =>'required|numeric',
            'Calibre' =>'required|numeric',
            'Ventas totales' =>'required|numeric',
            'Ciclo año' =>'required|numeric',
            'Variedad' => function($attribute,$value, $onFailure) {
                $variedad = Variedad::where('nombre',$value)->select('id_variedad')->first();
                $variedadUsuario = VariedadUsuario::where([
                    ['id_usuario',session('id_usuario')],
                    ['id_variedad',$variedad->id_variedad]
                ])->exists();
                if (!$variedadUsuario)
                    $onFailure('La variedad '.$value.' no esta asignada al usuario');
            }
        ];
    }

    public function customValidationMessages(){
        return [
            'Semana.required' => 'La colmuna :attribute está vacía',
            'Semana.numeric' => 'La colmuna :attribute debe ser un numero',
            'Variedad.required' => 'La colmuna :attribute está vacía',
            'Variedad.exists' => 'El dato de la colmuna :attribute no esta registrado en la base de datos',
            'Área.required' => 'La colmuna :attribute está vacía',
            'Tallos cosechados.required' => 'La colmuna :attribute está vacía',
            'Cajas exportadas.required' => 'La colmuna :attribute está vacía',
            'Calibre.required' => 'La colmuna :attribute está vacía',
            'Ventas totales.required' => 'La colmuna :attribute está vacía',
            'Ciclos año.required' =>'La colmuna :attribute está vacía',
            'Área.numeric' => 'La colmuna :attribute debe ser un número',
            'Tallos cosechados.numeric' => 'La colmuna :attribute debe ser un número',
            'Cajas exportadas.numeric' => 'La colmuna :attribute debe ser un número',
            'Calibre.numeric' => 'La colmuna :attribute debe ser un número',
            'Ventas totales.numeric' => 'La colmuna :attribute debe ser un número',
            'Ciclo año.numeric' =>'La colmuna :attribute debe ser un número'
        ];
    }

    public function model(array $row)
    {
        $variedad = Variedad::where('nombre', $row['Variedad'])->first();

        $objDatosFinca = DatosFinca::all()
            ->where('id_usuario', session('id_usuario'))
            ->where('id_variedad', $variedad->id_variedad)
            ->where('semana', $row['Semana'])->first();

        if (isset($objDatosFinca)) {
            $objDatosFinca->area = $row['Área'];
            $objDatosFinca->tallos = $row['Tallos cosechados'];
            $objDatosFinca->cajas = $row['Cajas exportadas'];
            $objDatosFinca->calibre = $row['Calibre'];
            $objDatosFinca->venta = $row['Ventas totales'];
            $objDatosFinca->ciclo_anno = $row['Ciclo año'];
            $objDatosFinca->save();
        } else {
            return new DatosFinca([
                'id_usuario' => session('id_usuario'),
                'id_variedad' => $variedad->id_variedad,
                'semana' => $row['Semana'],
                'area' => $row['Área'],
                'tallos' => $row['Tallos cosechados'],
                'cajas' => $row['Cajas exportadas'],
                'calibre' => $row['Calibre'],
                'venta' => $row['Ventas totales'],
                'ciclo_anno' => $row['Ciclo año'],
            ]);
        }
    }


    public function customValidationAttributes(){
        return [
            'Semana' => 'Semana',
            'Variedad' => 'Variedad',
            'Área' => 'Área',
            'Tallos cosechados' => 'Tallos cosechados',
            'Cajas exportadas' => 'Cajas exportadas',
            'Calibre' => 'Calibre',
            'Ventas totales' => 'Ventas',
            'Ciclo año' => 'Ciclo año'
        ];
    }

    public function batchSize(): int
    {
        return 200;
    }

    public function chunkSize(): int
    {
        return 100;
    }
}

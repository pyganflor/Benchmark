<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Http\Controllers\DashboardController;
use \App\Modelos\DatosFinca;
use Illuminate\Support\Facades\DB;

class Dashboard implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {

        $dashboardControlles = new DashboardController;
        $ultimasCuatroSemanas = $dashboardControlles->ultimas4Semanas();

        sort($ultimasCuatroSemanas);

        $promIndicadoresFinca = DatosFinca::where('id_usuario',session('id_usuario'))
            ->whereIn('semana',$ultimasCuatroSemanas)
            ->select(
                DB::raw('AVG(tallos/area) as tallos_m_cuadrado'),
                DB::raw('AVG(venta/tallos) as precio_tallo'),
                DB::raw('AVG(365/ciclo_anno) as ciclo'),
                DB::raw('AVG(tallos/calibre) as ramos'),
                DB::raw('AVG(venta) as dinero'),
                DB::raw('AVG(calibre) as calibre'),
                DB::raw('AVG(area) as area'),
                DB::raw('AVG(ciclo_anno) as ciclo_anno')
            )->first();

        $indicadores = DatosFinca::whereIn('semana',$ultimasCuatroSemanas)
            ->select(
                DB::raw('AVG(tallos/area) as tallos_m_cuadrado'),
                DB::raw('AVG(venta/tallos) as precio_tallo'),
                DB::raw('AVG(365/ciclo_anno) as ciclo'),
                DB::raw('AVG(tallos/calibre) as ramos'),
                DB::raw('AVG(venta) as dinero'),
                DB::raw('AVG(calibre) as calibre'),
                DB::raw('AVG(area) as area'),
                DB::raw('AVG(ciclo_anno) as ciclo_anno'),
                DB::raw('MIN(calibre) as min_calibre'),
                DB::raw('MIN(365/ciclo_anno) as min_ciclo'),
                DB::raw('MAX(tallos/calibre) as max_ramos'),
                DB::raw('MAX(venta) as max_dinero'),
                DB::raw('MAX(venta/tallos) as max_precio_tallo'),
                DB::raw('MAX(area) as max_area'),
                DB::raw('MAX(ciclo_anno) as max_ciclo_anno'),
                DB::raw('MAX(tallos/area) as max_tallos_m_cuadrado')
            )->first();

        $ultimaSemanaIndicador = DatosFinca::where([
            ['id_usuario',session('id_usuario')],
            ['semana',end($ultimasCuatroSemanas)]
        ])->select('calibre','ciclo_anno','area','semana','venta',
            DB::raw('(365/ciclo_anno) as ciclo'),
            DB::raw('(tallos/calibre) as ramos'),
            DB::raw('(venta/tallos) as precio_tallo'),
            DB::raw('(tallos/area) as tallos_m_cuadrado')
        )->first();

        return view('dashboard.partials.excel_dashboard', [
            'promIndicadoresFinca' => $promIndicadoresFinca,
            'indicadores' => $indicadores,
            'ultimaSemanaIndicador' => $ultimaSemanaIndicador
        ]);
    }
}

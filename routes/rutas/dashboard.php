<?php

    Route::get('indicadores','DashboardController@indicadores');
    Route::get('indicadores/vista_indicador','DashboardController@vistaIndicador');
    Route::get('indicadores/grafica','DashboardController@grafica');

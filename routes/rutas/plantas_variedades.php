<?php


    Route::get('planta_variedad','PlantaVariedadController@inicio');

    //PLANTAS
    Route::get('planta_variedad/plantas','PlantaVariedadController@plantas');
    Route::get('planta_variedad/form_plantas','PlantaVariedadController@formPlantas');
    Route::post('planta_variedad/store_plantas','PlantaVariedadController@storePlantas');
    Route::post('planta_variedad/estado_planta','PlantaVariedadController@estadoPlanta');
    Route::post('planta_variedad/delete_planta','PlantaVariedadController@deletePlanta');

    //VARIEDADES
    Route::get('planta_variedad/variedades','PlantaVariedadController@variedades');
    Route::get('planta_variedad/form_variedades','PlantaVariedadController@formVariedades');
    Route::post('planta_variedad/store_variedades','PlantaVariedadController@storeVariedades');
    Route::post('planta_variedad/estado_variedades','PlantaVariedadController@estadoVariedades');
    Route::post('planta_variedad/delete_variedades','PlantaVariedadController@deleteVariedades');

    //ASIGNA VARIEDADES
    Route::get('planta_variedad/asigna_variedades','PlantaVariedadController@asignaVariedades');
    Route::post('planta_variedad/store_asignacion_variedad','PlantaVariedadController@storeAsignacionVariedades');
    Route::post('planta_variedad/delete_asignacion_variedad','PlantaVariedadController@deleteAsignacionVariedades');

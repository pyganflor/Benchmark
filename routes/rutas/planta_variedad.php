<?php

    Route::get('planta_variedad','PlantaVariedadController@inicio');
    Route::get('planta_variedad/plantas','PlantaVariedadController@plantas');
    Route::get('planta_variedad/variedades','PlantaVariedadController@variedades');
    Route::get('planta_variedad/form_plantas','PlantaVariedadController@formPlantas');

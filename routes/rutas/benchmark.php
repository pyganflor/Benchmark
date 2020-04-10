<?php

    Route::get('benchmark','BenchmarkController@inicio');
    Route::get('benchmark/upload_file','BenchmarkController@uploadFile');
    Route::get('benchmark/cargad_manual','BenchmarkController@cargaManual');
    Route::get('benchmark/options_variedades','BenchmarkController@optionsVariedades');
    Route::post('benchmark/store_data_file','BenchmarkController@storeDataFile');

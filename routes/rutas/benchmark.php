<?php

    Route::get('benchmark','BenchmarkController@inicio');
    Route::get('benchmark/upload_file','BenchmarkController@uploadFile');
    Route::get('benchmark/cargad_manual','BenchmarkController@cargaManual');

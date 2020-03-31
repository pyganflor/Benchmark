<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
    Route::get('login', 'LoginController@login');
    Route::post('login/acceder', 'LoginController@acceder');
    Route::get('/','DashboardController@inicio');

    include_once('rutas/admin_usuarios.php');
    include_once('rutas/benchmark.php');
    include_once('rutas/dashboard.php');


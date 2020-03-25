<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function inicio(){
        return view('dashboard.inicio');
    }

    public function indicadores(){
        return view('dashboard.partials.indicadores');
    }
}

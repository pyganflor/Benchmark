@extends('template.master')

@section('titulo')
    Dashboard
@endsection

@section('contenido')

    <div class="form-row">

    </div>
    <div id="div_indicadores" class="w-100"></div>

@endsection
@section('custom_script')
    @include('dashboard.script')
@endsection

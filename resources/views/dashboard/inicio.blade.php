@extends('template.master')

@section('titulo')
    Datos
@endsection

@section('contenido')
    <div class="col-12">
        <div class="pl-2 pr-2">
            <buttom class="btn btn-sm btn-success bnt-round">
                <i class="far fa-file-alt"></i> Importar archivo
            </buttom>
        </div>
        <div class="pl-2 pr-2">
            <buttom class="btn btn-sm btn-success bnt-round">
                <i class="fas fa-plus-circle"></i> Añadir datos
            </buttom>
        </div>
    </div>
    <div class="card-body">
        <div class="card-header">
            <h3 class="card-title">
                <div class="input-group">
                    <span class="input-group-prepend"> <i class="fas fa-seedling"></i></span>
                    <select class="select-custom form-control form-control-sm select-round">
                        <option value="">Seleccione</option>
                    </select>
                </div>
            </h3>
            <div class="card-tools" style="padding-right: 10px;">
                <ul class="pagination pagination-sm float-right">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0 ">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Task</th>
                    <th>Progress</th>
                    <th style="width: 40px">Label</th>
                </tr>
                </thead>
                <tbody class="bg-gradient-white">
                <tr>
                    <td>1.</td>
                    <td>Update software</td>
                    <td>
                        <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                    </td>
                    <td><span class="badge bg-danger">55%</span></td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Clean database</td>
                    <td>
                        <div class="progress progress-xs">
                            <div class="progress-bar bg-warning" style="width: 70%"></div>
                        </div>
                    </td>
                    <td><span class="badge bg-warning">70%</span></td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>Cron job running</td>
                    <td>
                        <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar bg-primary" style="width: 30%"></div>
                        </div>
                    </td>
                    <td><span class="badge bg-primary">30%</span></td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>Fix and squish bugs</td>
                    <td>
                        <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar bg-success" style="width: 90%"></div>
                        </div>
                    </td>
                    <td><span class="badge bg-success">90%</span></td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

@section('custom_script')
    @include('dashboard.script')
@endsection

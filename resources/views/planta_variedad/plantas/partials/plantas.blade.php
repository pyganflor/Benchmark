<div class="w-100">
    <table id="tbl_planta" class="table table-sm table-bordered" >
        <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th class="text-center">Estado </th>
            <th class="text-center">Acción</th>
        </tr>
        </thead>
        <tbody class="bg-gradient-white" >
            @foreach($plantas as $x=> $planta)
                <tr>
                    <td>
                        {{$x+1}}
                    </td>
                    <td class="text-center">
                        {{$planta->nombre}}
                    </td>
                    <td class="text-center">
                        {{$planta->estado ==1 ? 'Activo' : 'Inactivo'}}
                    </td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-{{$planta->estado ==1 ? 'default' : 'success'}}
                                text-{{$planta->estado ==1 ? 'black' : 'light'}}" style="cursor:pointer"
                                title="{{$planta->estado ==1 ? 'Descativar' : 'Activar'}} planta"
                                onclick="estado_planta('{{$planta->estado}}','{{$planta->id_planta}}')">
                                <i class="fas fa-{{$planta->estado ==1 ? 'ban' : 'check'}}"></i>
                        </button>
                        <button class="btn btn-sm btn-warning text-light" style="cursor:pointer"
                                id="btn_edit_planta" title="Editar planta"
                                onclick="form_planta('{{$planta->id_planta }}')">
                                <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm  btn-danger text-light" style="cursor:pointer"
                                id="delete_planta" title="Eliminar planta"
                                onclick="delete_planta('{{$planta->id_planta }}')">
                                <i class="far fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
</div>
<script>
    $(function () {
        $("#tbl_planta").DataTable({
            initComplete: function () {
                this.api().column(2).every( function () {
                    var column = this;
                    var select = $('<select class="form-control form-control-sm ml-1" style="display: inline-block;width: auto;">' +
                                        '<option value="">Todas</option>' +
                                  '</select>');
                    var label = $("<label class='ml-1' id='label-estado'>Estado:</label>");
                    label.appendTo( "#tbl_planta_filter" );
                    select.appendTo( "#label-estado" ).change( function () {
                        var val = $.fn.dataTable.util.escapeRegex($(this).val());
                        column.search( val ? '^'+val+'$' : '', true, false ).draw();
                    });
                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                });
            },
            "ordering": true,
            "language": {
                "paginate": {
                    first:    'Inicio',
                    previous: 'Anterior',
                    next:     'Siguiente',
                    last:     'Último'
                },
                "sSearch":         "Buscar:",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "infoEmpty": "No se encontraron registros",
                "loadingRecords": "Cargando datos...",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sLoadingRecords": "Cargando...",
                "sZeroRecords":    "No se encontraron resultados",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sLengthMenu":     "Mostrar _MENU_ registros",
            },
            dom: 'Bfrtip',
            buttons: [
                {
                    text: '<i class="fas fa-plus-circle"></i> Agregar planta',
                    className: 'btn btn-success float-left btn-green-custom bnt-round m-1',
                    action: function ( e, dt, node, config ) {
                        form_planta();
                    }
                },
            ],
        });
    });
</script>

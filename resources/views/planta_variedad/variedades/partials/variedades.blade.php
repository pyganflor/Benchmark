<div class="w-100">
    <table id="tbl_variedad" class="table table-sm table-bordered" >
        <thead>
        <tr>
            <th>#</th>
            <th class="text-center">Planta</th>
            <th class="text-center">Variedad</th>
            <th class="text-center">Estado </th>
            <th class="text-center">Acción</th>
        </tr>
        </thead>
        <tbody class="bg-gradient-white" >
        @foreach($variedades as $x=> $variedad)
            <tr>
                <td>
                    {{$x+1}}
                </td>
                <td class="text-center">
                    {{$variedad->planta->nombre}}
                </td>
                <td class="text-center">
                    {{$variedad->nombre}}
                </td>
                <td class="text-center">
                    {{$variedad->estado ==1 ? 'Activo' : 'Inactivo'}}
                </td>
                <td class="text-center">
                    <button class="btn btn-sm btn-{{$variedad->estado ==1 ? 'default' : 'success'}}
                        text-{{$variedad->estado ==1 ? 'black' : 'light'}}" style="cursor:pointer"
                            title="{{$variedad->estado ==1 ? 'Descativar' : 'Activar'}} planta"
                            onclick="estado_variedad('{{$variedad->estado}}','{{$variedad->id_variedad}}')">
                        <i class="fas fa-{{$variedad->estado ==1 ? 'ban' : 'check'}}"></i>
                    </button>
                    <button class="btn btn-sm btn-warning text-light" style="cursor:pointer"
                            id="btn_edit_variedad" title="Editar planta"
                            onclick="form_variedad('{{$variedad->id_variedad }}')">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-sm  btn-danger text-light" style="cursor:pointer"
                            id="delete_variedad" title="Eliminar planta"
                            onclick="delete_variedad('{{$variedad->id_variedad }}')">
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
        $("#tbl_variedad").DataTable({
            initComplete: function () {
                this.api().column(3).every( function () {
                    var column = this;
                    var select = $('<select class="form-control form-control-sm ml-1" style="display: inline-block;width: auto;">' +
                        '<option value="">Todas</option>' +
                        '</select>');
                    var label = $("<label class='ml-1' id='label-estado-variedad'>Estado:</label>");
                    label.appendTo( "#tbl_variedad_filter" );
                    select.appendTo( "#label-estado-variedad" ).change( function () {
                        var val = $.fn.dataTable.util.escapeRegex($(this).val());
                        column.search( val ? '^'+val+'$' : '', true, false ).draw();
                    });
                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    });
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
                    text: '<i class="fas fa-plus-circle"></i> Agregar Variedad',
                    className: 'btn btn-success float-left btn-green-custom bnt-round m-1',
                    action: function ( e, dt, node, config ) {
                        form_variedad();
                    }
                },
            ],
        });
    });
</script>

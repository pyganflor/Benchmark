<div class="w-100">
    <table id="tbl_asigna_variedad" class="table table-sm table-bordered" >
        <thead>
        <tr>
            <th>#</th>
            <th class="text-center">Planta</th>
            <th class="text-center">Variedad</th>
            <th class="text-center">Asignar </th>
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
                    @if($variedad->variedad_usuario())
                        <button class="btn btn-sm btn-default" title="Eliminar asignación"
                                onclick="delete_asignacion('{{$variedad->id_variedad}}')">
                            <i class="fas fa-ban"></i>
                        </button>
                    @else
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input asinga_variedad" type="checkbox"
                                   id="{{$variedad->id_variedad}}">
                            <label for="{{$variedad->id_variedad}}" class="custom-control-label"
                            style="cursor:pointer"></label>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script>
    $(function () {
        $("#tbl_asigna_variedad").DataTable({
            initComplete: function () {
                this.api().column(2).every( function () {
                    var column = this;
                    var select = $('<select class="form-control form-control-sm ml-1" style="display: inline-block;width: auto;">' +
                        '<option value="">Todas</option>' +
                        '</select>');
                    var label = $("<label class='ml-1' id='label-asigna-variedad'>Planta:</label>");
                    label.appendTo( "#tbl_asigna_variedad_filter" );
                    select.appendTo( "#label-asigna-variedad" ).change( function () {
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
                    text: '<i class="fas fa-save"></i> Guardar asignación',
                    className: 'btn btn-success float-left btn-green-custom bnt-round m-1',
                    action: function ( e, dt, node, config ) {
                        store_asignacion();
                    }
                }
            ]
        });
    });
</script>

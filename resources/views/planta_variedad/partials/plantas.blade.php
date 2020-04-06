<div class="w-100">
    <table id="tbl_planta" class="table table-sm table-bordered" >
        <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th class="text-center">Estado</th>
            <th class="text-center">Acción</th>
        </tr>
        </thead>
        <tbody class="bg-gradient-white" >
            <tr>
                <td>
                    1
                </td>
                <td class="text-center">

                </td>
                <td class="text-center">

                </td>
                <td class="text-center">

                </td>

            </tr>
        </tbody>
    </table>
</div>
<script>
    $(function () {
        $("#tbl_planta").DataTable({
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

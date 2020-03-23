<script>
    $(function () {
        $("#example1").DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": false,
            "scrollX": true,
            "language": {
                "paginate": {
                    first:    'Inicio',
                    previous: 'Anterior',
                    next:     'Siguiente',
                    last:     'Último'
                },
                "infoEmpty": "No se encontraron registros",
                "loadingRecords": "Cargando datos..."
            },
            fixedColumns: {
                leftColumns: 1
            }
        });
    });
</script>

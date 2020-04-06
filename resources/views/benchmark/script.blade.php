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
                "loadingRecords": "Cargando datos...",
                "sSearch":         "Buscar:",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sLoadingRecords": "Cargando...",
                "sZeroRecords":    "No se encontraron resultados",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sLengthMenu":     "Mostrar _MENU_ registros",
            },
            fixedColumns: {
                leftColumns: 1
            }
        });
    });

    $("#importar_archivo").click(function () {
        data = {
            url : '{{url('benchmark/upload_file')}}',
            method : 'GET',
            title : 'Cargar archivo excel',
            col : 'col-md-8',
            titleClass : 'title-modal-in-view',
            iconTitle : 'fas fa-file-upload',
            datos :{},
        };
        load_form_in_modal(data,function(){
            upload_file();
        },'#form-excel');
    });


    $("#carga_datos_manual").click(function () {
        data = {
            url : '{{url('benchmark/cargad_manual')}}',
            method : 'GET',
            title : 'Cargar datos',
            col : 'col-md-10',
            titleClass : 'title-modal-in-view',
            iconTitle : 'fas fa-edit',
            datos :{},
        };
        load_form_in_modal(data,function(){
            carga_datos_manual();
        },'#datos-manuales');
    });


    function upload_file(){
        console.log("hola");
    }

    function carga_datos_manual(){
        console.log("hola2",);
    }

</script>

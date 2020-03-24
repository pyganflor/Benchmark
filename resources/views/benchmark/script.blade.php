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
        load_view_in_modal(data,function(){
            upload_file();
        });
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
        load_view_in_modal(data,function(){
            carga_datos_manual();
        });
    });


    function upload_file(){
        console.log("hola");
    }

    function carga_datos_manual(){
        console.log("hola2");
    }

</script>

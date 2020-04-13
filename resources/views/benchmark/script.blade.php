<script>

    tabla();

    function tabla(){

        data={
            url : '{{url('benchmark/tabla')}}',
            type : 'GET',
            id  : 'tabla_benchmark',
            datos :{}
        };
        load_view(data)
    }

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
        load_form_in_modal(data);
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
        load_form_in_modal(data);
    });

</script>

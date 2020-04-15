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

    $("#planta_bechmark").change(function () {
        load();
        $("select#id_variedad option.option_dinamic").remove();
        $.ajax({
            url: '{{url('benchmark/options_variedades')}}',
            type: 'GET',
            data : {
                id_planta : this.value
            },
            success: function(response){
                console.log(response);
                $.each(response,function(i,j){
                    $("select#id_variedad").append("<option class='option_dinamic' value='"+j.id_variedad+"'>"+j.nombre+"</option>");
                });
            }
        }).always(function(){
            load(false);
        });
    });

    $("#btn_tabla").click(function(){
        tabla();
    });

</script>

<script>

    ver_indicadores();

    function ver_indicadores(){
        data={
            url : '{{url('indicadores')}}',
            type : 'GET',
            id  : 'div_indicadores',
            datos :{}
        };
        load_view(data);
    }

    function indicador(indicador){

        if(indicador===1){
            tipo_indicador =' Calibre';
        }else if(indicador===2){
            tipo_indicador =' Ciclo';
        }else if(indicador===3){
            tipo_indicador =' Precio ramo';
        }else if(indicador===4){
            tipo_indicador =' Precio tallo';
        }else if(indicador===5){
            tipo_indicador =' Productividad';
        }else if(indicador===6){
            tipo_indicador =' Tallos x m2';
        }

        data = {
            url : '{{url('indicadores/vista_indicador')}}',
            method : 'GET',
            title : 'Indicador'+tipo_indicador,
            col : 'col-md-6',
            titleClass : 'title-modal-in-view',
            iconTitle : 'fas fa-table',
            datos :{
                indicador : indicador
            },
        };
        load_form_in_modal(data);
    }

    function planta_dashboard(){
        load();
        $("select#id_variedad option.option_dinamic").remove();
        $.ajax({
            url: '{{url('benchmark/options_variedades')}}',
            type: 'GET',
            data : {
                id_planta : this.value
            },
            success: function(response){
                $.each(response,function(i,j){
                    $("select#id_variedad").append("<option class='option_dinamic' value='"+j.id_variedad+"'>"+j.nombre+"</option>");
                });
            }
        }).always(function(){
            load(false);
        });
    }
    /*$("#planta_dashboard").change(function () {

    });*/

</script>

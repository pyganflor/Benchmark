<script>

    plantas();

    function plantas(){
        data={
            url : '{{url('planta_variedad/plantas')}}',
            type : 'GET',
            id  : 'tabla_plantas',
            datos :{}
        };
        load_view(data);
    }

    function variedades(){
        data={
            url : '{{url('planta_variedad/variedades')}}',
            type : 'GET',
            id  : 'tabla_variedades',
            datos :{}
        };
        load_view(data);
    }

    function form_planta(){
        data = {
            url : '{{url('planta_variedad/form_plantas')}}',
            method : 'GET',
            title : 'Crear plantas',
            col : 'col-md-8',
            titleClass : 'title-modal-in-view',
            iconTitle : 'fas fa-leaf',
            datos :{},
        };
        load_form_in_modal(data,function(){
            store_planta()
        },'#form-planta');

        //cant = $("tr.tr_nuevo_planta").length+1;

        /*$("#tbody_planta").prepend(
            "<tr class='tr_nuevo_planta' id='tr_nuevo_planta_"+cant+"'>" +
                "<td class='text-center'>Nuevo</td>" +
                "<td class='text-center'>" +
                    "<input type='text' class='form-control form-control-sm' " +
                        "placeholder='Nombre' required>" +
                " </td>" +
                "<td class='text-center'>" +
                    "<select class='form-control form-control-sm'>" +
                        "<option value='1'>Activo</option>"+
                        "<option value='0'>Inactivo</option>"+
                    "</select>" +
                "</td>" +
                "<td class='text-center'>" +
                    "<button class='btn btn-sm btn-success ml-1 mr-1' onclick='store_row_planta()'>" +
                        "<i class='far fa-save'></i> Guardar" +
                    "</button>" +
                    "<button class='btn btn-sm btn-danger ml-1 mr-1' onclick='delete_row_planta("+cant+")'>" +
                        "<i class='far fa-trash-alt'></i> Eliminar" +
                    "</button>"+
                "</td>" +
            "</tr>"
        );*/
    }

    function store_planta(){

    }

    function delete_row_planta(id){
        $("tr#tr_nuevo_planta_"+id).remove();
    }

</script>

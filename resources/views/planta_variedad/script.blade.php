<script>

    //GESTION PLANTAS
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

    function form_planta(id_planta){
        data = {
            url : '{{url('planta_variedad/form_plantas')}}',
            method : 'GET',
            title : 'Crear plantas',
            col : 'col-md-8',
            titleClass : 'title-modal-in-view',
            iconTitle : 'fas fa-leaf',
            datos :{
                id_planta : id_planta
            },
        };
        load_form_in_modal(data);
    }

    function estado_planta(estado,id_planta){
        estado == 1
            ? text= 'Desactivar'
            : text = 'Activar';

        content = "<div class='alert alert-info text-light text-center w-100'>"
                        +"Esta seguro en "+text+" la planta?" +
                 "</div>";

        confirmar(content, function () {

            data = {
                url: '{{url('planta_variedad/estado_planta')}}',
                type: 'POST',
                datos: {
                    estado : estado,
                    id_planta : id_planta
                }
            };
            request_ajax(data, function () {
                plantas();
                close_dialog();
            });
        });

    }
    
    function delete_planta(id_planta) {
        content = "<div class='alert alert-info text-light text-center w-100'>"
            +"Esta seguro en Eliminar la planta?, esto borrar tambien las variedades asignadas a esta planta" +
            "</div>";

        confirmar(content, function () {

            data = {
                url: '{{url('planta_variedad/delete_planta')}}',
                type: 'POST',
                datos: {
                    id_planta : id_planta
                }
            };
            request_ajax(data, function () {
                plantas();
                close_dialog();
            });
        });
    }

    //GESTION VARIEDADES
    variedades();

    function variedades(){
        data={
            url : '{{url('planta_variedad/variedades')}}',
            type : 'GET',
            id  : 'tabla_variedades',
            datos :{}
        };
        load_view(data);
    }

    function form_variedad(id_variedad){
        data = {
            url : '{{url('planta_variedad/form_variedades')}}',
            method : 'GET',
            title : 'Crear variedades',
            col : 'col-md-8',
            titleClass : 'title-modal-in-view',
            iconTitle : 'fas fa-cubes',
            datos :{
                id_variedad : id_variedad
            },
        };
        load_form_in_modal(data);
    }

    function estado_variedad(estado,id_variedad){
        estado == 1
            ? text= 'Desactivar'
            : text = 'Activar';

        content = "<div class='alert alert-info text-light text-center w-100'>"
            +"Esta seguro en "+text+" la variedad?" +
            "</div>";

        confirmar(content, function () {

            data = {
                url: '{{url('planta_variedad/estado_variedades')}}',
                type: 'POST',
                datos: {
                    estado : estado,
                    id_variedad : id_variedad
                }
            };
            request_ajax(data, function () {
                variedades();
                close_dialog();
            });
        });

    }

    function delete_variedad(id_variedad) {
        content = "<div class='alert alert-info text-light text-center w-100'>"
            +"Esta seguro en eliminar la variedad?" +
            "</div>";

        confirmar(content, function () {

            data = {
                url: '{{url('planta_variedad/delete_variedades')}}',
                type: 'POST',
                datos: {
                    id_variedad : id_variedad
                }
            };
            request_ajax(data, function () {
                variedades();
                close_dialog();
            });
        });
    }


    //GESTION ASIGNA VARIEDADES
    asigna_variedades();

    function asigna_variedades() {
        data={
            url : '{{url('planta_variedad/asigna_variedades')}}',
            type : 'GET',
            id  : 'tabla_asigna_variedad',
            datos :{}
        };
        load_view(data);
    }

    function store_asignacion() {
        variedad_usuario=[];
        $.each($("input.asinga_variedad"),function(i,j){

            if($(j).is(':checked')){
                variedad_usuario.push({
                    id_variedad : j.id
                });
            }

        });
        if(variedad_usuario.length===0){
            error_request("Debe agregar al menos una planta");
            return false;
        }

        content = "<div class='alert alert-info text-light text-center w-100'>"
            +"Desea guardar las plantas?" +
            "</div>";

        confirmar(content, function () {

            data = {
                url: '{{url('planta_variedad/store_asignacion_variedad')}}',
                type: 'POST',
                datos: {
                    variedad_usuario : variedad_usuario
                }
            };
            request_ajax(data, function () {
                asigna_variedades();
                close_dialog();
            });
        });
    }

    function delete_asignacion(id_variedad){
        content = "<div class='alert alert-info text-light text-center w-100'>"
            +"Esta seguro de eliminar esta asignación?" +
            "</div>";

        confirmar(content, function () {

            data = {
                url: '{{url('planta_variedad/delete_asignacion_variedad')}}',
                type: 'POST',
                datos: {
                    id_variedad : id_variedad
                }
            };
            request_ajax(data, function () {
                asigna_variedades();
                close_dialog();
            });
        });
    }
</script>

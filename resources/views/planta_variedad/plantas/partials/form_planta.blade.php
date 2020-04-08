<form id="form-planta" class="pt-3 pb-3" novalidate>
    <div class="text-right pb-2">
        <button type="button" class="btn btn-success btn-sm"
                id="btn_add_planta" title="Agregar planta">
            <i class="fas fa-plus-circle"></i>
        </button>
    </div>
    <div class="form-row" id="inputs_planta">
        <div class="col-md-4 col-sm-6 pb-4 input_planta" id='input_planta_1'>
            <div class="input-group">
                <input type="text" class="form-control form-control-sm nombre_planta"
                       data-id-planta="{{isset($planta) ? $planta->id_planta : ''}}" minlength="2"
                       placeholder="Nombre de la planta" name="nombre_planta_1" id='nombre_planta_1'
                       value="{{isset($planta) ? $planta->nombre : ''}}" required>
                <div class="input-group-append">
                    <button type="button" class="btn btn-sm btn-danger" title="Eliminar campo" onclick="delete_input_planta(1)">
                        <i class='far fa-trash-alt'></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <button type="button" class="btn btn-sm btn-secondary" onclick="close_dialog()">
            <i class="fas fa-ban"></i> Cerrar
        </button>
        <button type="button" class="btn btn-sm btn-success" id="btn_store_planta">
            <i class="fas fa-save"></i> Guardar
        </button>
    </div>
</form>
<script>
    $("button#btn_add_planta").click(function () {
        cant = $("div.input_planta").length+1;
        $("#inputs_planta").append(
            "<div class='col-md-4 col-sm-6 pb-4 input_planta' id='input_planta_"+cant+"'>" +
            "   <div class='input-group'>" +
            "        <input type='text' class='form-control form-control-sm nombre_planta' minlength='2' name='nombre_planta_"+cant+"' " +
            "               id='nombre_planta_"+cant+"' placeholder='Nombre de la planta' required>" +
            "        <div class='input-group-append'>" +
            "            <button type='button' class='btn btn-sm btn-danger' title='Eliminar campo' onclick='delete_input_planta("+cant+")'>" +
            "                <i class='far fa-trash-alt'></i>" +
            "            </button>" +
            "        </div>" +
            "   </div>" +
            "</div>");
    });

    $("#btn_store_planta").click(function () {
        if($("#form-planta").valid()){

            planta=[];
            $.each($("input.nombre_planta"),function(i,j){
                planta.push({
                    nombre : $(j).val(),
                    id_planta : $(j).attr('data-id-planta')
                });
            });

            if(planta.length===0){
                error_request("Debe agregar al menos una planta");
                return false;
            }

            content = "<div class='alert alert-info text-light text-center w-100'>"
                        +"Desea guardar las plantas?" +
                      "</div>";

            confirmar(content, function () {

                data = {
                    url: '{{url('planta_variedad/store_plantas')}}',
                    type: 'POST',
                    datos: {
                        planta : planta
                    }
                };
                request_ajax(data, function () {
                    plantas();
                    close_dialog();
                });
            });
        }
    });

    function delete_input_planta(id) {
        cant = $("div.input_planta").length;
        if(cant>1)
            $("#input_planta_"+id).remove()
    }
</script>

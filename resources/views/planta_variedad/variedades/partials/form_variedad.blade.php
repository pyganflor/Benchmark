<form id="form-variedad" class="pt-3 pb-3" novalidate>
    <div class="text-right pb-2">
        <button type="button" class="btn btn-success btn-sm"
                id="btn_add_variedad" title="Agregar variedad">
            <i class="fas fa-plus-circle"></i>
        </button>
    </div>
    <div class="form-row" id="inputs_variedad">
        <div class="col-md-6 col-sm-12 pb-4 input_variedad" id='input_variedad_1'>
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text">Planta</span>
                </div>
                <div class="input-group-prepend">
                    <select class="form-control form-control-sm id_planta" style="border-radius:0">
                        @foreach($plantas as $planta)
                            <option {{isset($variedad) && $variedad->id_planta ==$planta->id_planta ? 'selected' : ''}}
                                value="{{$planta->id_planta}}">{{$planta->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <input type="text" class="form-control form-control-sm nombre_variedad"
                       data-id-variedad="{{isset($variedad) ? $variedad->id_variedad : ''}}" minlength="2"
                       placeholder="Nombre de la variedad" name="nombre_variedad_1" id='nombre_variedad_1'
                       value="{{isset($variedad) ? $variedad->nombre : ''}}" required>
                <div class="input-group-append">
                    <button type="button" class="btn btn-sm btn-danger" title="Eliminar campo" onclick="delete_input_variedad(1)">
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
        <button type="button" class="btn btn-sm btn-success" id="btn_store_variedad">
            <i class="fas fa-save"></i> Guardar
        </button>
    </div>
</form>
<script>
    $("button#btn_add_variedad").click(function () {
        cant = $("div.input_variedad").length+1;
        $("#inputs_variedad").append(
            "<div class='col-md-6 col-sm-12 pb-4 input_variedad' id='input_variedad_"+cant+"'>" +
            "   <div class='input-group input-group-sm'>" +
            "       <div class='input-group-prepend'>" +
            "           <span class='input-group-text'>Planta</span>" +
            "       </div>" +
            "       <div class='input-group-prepend'>" +
            "           <select class='form-control form-control-sm id_planta' style='border-radius:0'>" +
            "                @foreach($plantas as $planta)" +
            "                    <option value={{$planta->id_planta}}>{{$planta->nombre}}</option>" +
            "                @endforeach" +
            "            </select>" +
            "       </div>"+
            "       <input type='text' class='form-control form-control-sm nombre_variedad' minlength='2' name='nombre_variedad_"+cant+"' " +
            "              id='nombre_variedad_"+cant+"' placeholder='Nombre de la variedad' required>" +
            "       <div class='input-group-append'>" +
            "           <button type='button' class='btn btn-sm btn-danger' title='Eliminar campo' onclick='delete_input_variedad("+cant+")'>" +
            "               <i class='far fa-trash-alt'></i>" +
            "           </button>" +
            "       </div>" +
            "   </div>" +
            "</div>");
    });

    $("#btn_store_variedad").click(function () {
        if($("#form-variedad").valid()){

            variedad=[];
            $.each($("div.input_variedad"),function(i,j){
                variedad.push({
                    nombre : $(j).find('input.nombre_variedad').val(),
                    id_variedad : $(j).find('input.nombre_variedad').attr('data-id-variedad'),
                    id_planta :  $(j).find('.id_planta').val()
                });
            });
            if(variedad.length===0){
                error_request("Debe agregar al menos una variedad");
                return false;
            }

            content = "<div class='alert alert-info text-light text-center w-100'>"
                        +"Desea guardar las variedades?" +
                      "</div>";

            confirmar(content, function () {

                data = {
                    url: '{{url('planta_variedad/store_variedades')}}',
                    type: 'POST',
                    datos: {
                        variedad : variedad
                    }
                };
                request_ajax(data, function () {
                    variedades();
                    close_dialog();
                });
            });
        }
    });

    function delete_input_variedad(id) {
        cant = $("div.input_variedad").length;
        if(cant>1)
            $("#input_variedad_"+id).remove()
    }
</script>

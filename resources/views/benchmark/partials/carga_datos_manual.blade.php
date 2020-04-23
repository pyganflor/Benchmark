<form id="datos-manuales" class="mt-4">
    <div class="form-row">
        <div class="col-md-3 colsm-12 col-xs-12 mt-2 mt-md-0" id="input-semana" style="cursor: pointer"
             data-toggle="tooltip" data-placement="top"
             title="Al hacer doble click en el ícono se cambiará el metodo de entrada de la semana">
            <div class="input-group-prepend" >
                <span class="input-group-text bg-silver-dark-custom all-round icon-select-custom"
                      style="left: 5px;">
                    <i class="far fa-calendar-alt"></i>
                </span>
            </div>
            <select id="semana_select" class="form-control form-control-sm text-center input-datos-manual-custom"
                    style="padding-left:50px">
                <option value="">Semana</option>
                @foreach($semanas as $semana)
                    <option value="{{$semana->semana}}">{{$semana->semana}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 colsm-12 col-xs-12 mt-2 mt-md-0">
            <div class="input-group-prepend">
                <span class="input-group-text bg-silver-dark-custom all-round icon-select-custom"
                      style="left: 5px;">
                    <i class="fas fa-seedling"></i>
                </span>
            </div>
            <select id="select_planta" class="form-control form-control-sm text-center input-datos-manual-custom"
                    style="padding-left:50px">
                <option value="">Planta</option>
                @foreach($plantas as $planta)
                    <option value="{{$planta->id_planta}}">{{$planta->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 colsm-12 col-xs-12 mt-2 mt-md-0">
            <div class="input-group-prepend">
                <span class="input-group-text bg-silver-dark-custom all-round icon-select-custom"
                      style="left: 5px;">
                    <i class="fas fa-leaf"></i>
                </span>
            </div>
            <select id="select_variedad" class="form-control form-control-sm text-center input-datos-manual-custom"
                    style="padding-left:50px">
                <option value="">Variedad</option>
            </select>
        </div>
    </div>
    <div class="form-row mt-3 mb-4">
        <div class="col-md-2 col-sm-6 col-xs-6">
            <label class="label label-sm">Área m<sup>2</sup></label>
            <input type="number" id="area" name="area" required
                   class="form-control form-control-sm text-center input-datos-manual-custom">
        </div>
        <div class="col-md-2 col-sm-6 col-xs-6">
            <label class="label label-sm">Tallos cosechados</label>
            <input type="number" id="tallos_cosechados" name="tallos_cosechados" required
                   class="form-control form-control-sm text-center input-datos-manual-custom">
        </div>
        <div class="col-md-2 col-sm-6 col-xs-6">
            <label class="label label-sm">Cajas exportadas</label>
            <input type="number" id="cajas_exportadas" name="cajas_exportadas" required
                   class="form-control form-control-sm text-center input-datos-manual-custom">
        </div>
        <div class="col-md-2 col-sm-6 col-xs-6">
            <label class="label label-sm">Ciclo año</label>
            <input type="number" id="ciclo_anno" name="ciclo_anno" required
                   class="form-control form-control-sm text-center input-datos-manual-custom">
        </div>
        <div class="col-md-2 col-sm-6 col-xs-6">
            <label class="label label-sm">Calibre</label>
            <input type="number" id="calibre" name="calibre" required
                   class="form-control form-control-sm text-center input-datos-manual-custom">
        </div>
        <div class="col-md-2 col-sm-6 col-xs-6">
            <label class="label label-sm">Ventas totales</label>
            <input type="number" id="ventas_totales" name="ventas-totales" required
                   class="form-control form-control-sm text-center input-datos-manual-custom">
        </div>
    </div>
    <div class="text-center">
        <button type="button" class="btn btn-sm btn-secondary" onclick="close_dialog()">
            <i class="fas fa-ban"></i> Cerrar
        </button>
        <button type="button" class="btn btn-sm btn-success" id="btn_carga_manual">
            <i class="fas fa-save"></i> Guardar
        </button>
    </div>
</form>
<script>
    $("#btn_carga_manual").click(function(){
        if($("#datos-manuales").valid()){
            content = "<div class='alert alert-info text-light text-center w-100'>"
                            +"Esta seguro de guardar los datos ingresados?" +
                        "</div>";

            confirmar(content, function () {

                data = {
                    url: '{{url('benchmark/store_data_manual')}}',
                    type: 'POST',
                    datos: {
                        semana : $("#semana_select").length == 1 ? $("#semana_select").val() : $("#semana_input").val(),
                        variedad : $("#select_variedad").val(),
                        area : $("#area").val(),
                        tallos : $("#tallos_cosechados").val(),
                        cajas : $("#cajas_exportadas").val(),
                        calibre : $("#calibre").val(),
                        ventas : $("#ventas_totales").val(),
                        ciclo_anno : $("#ciclo_anno").val()
                    }
                };
                request_ajax(data, function () {
                    //tabla();
                    close_dialog();
                    location.reload();
                });
            });
        }
    });

    $("#select_planta").change(function(){
        $("select#select_variedad option.option_dinamic").remove();
        //load();
        $.ajax({
            url: '{{url('benchmark/options_variedades')}}',
            type: 'GET',
            data : {
                id_planta : $("#select_planta").val()
            },
            success: function(response){
                console.log(response);
                $.each(response,function(i,j){
                    $("select#select_variedad").append("<option class='option_dinamic' value='"+j.id_variedad+"'>"+j.nombre+"</option>");
                });
            }
        }).always(function(){
            //load(false);
        });
    });

    $("#input-semana").dblclick(function () {
        if($(this).find('#semana_select').length==1){
            $(this).find('#semana_select').remove();
            html = '<input type="number" id="semana_input" class="input-datos-manual-custom form-control text-center form-control-sm">';
        }else{
            $("#semana_input").remove();
            html = '<select id="semana_select" class="form-control form-control-sm text-center input-datos-manual-custom"' +
                '           style="padding-left:50px">' +
                '      <option value="">Semana</option>' +
                '      @foreach($semanas as $semana)' +
                '           <option value="{{$semana->semana}}">{{$semana->semana}}</option>' +
                '      @endforeach' +
                '   </select>';
        }
        $("#input-semana").append(html);
    });
    $('[data-toggle="tooltip"]').tooltip();

</script>

<form id="datos-manuales" class="mt-4">
    <div class="form-row">
        <div class="col-md-4 colsm-12 col-xs-12">
            <div class="input-group-prepend">
                <span class="input-group-text bg-silver-dark-custom all-round icon-select-custom"
                      style="left: 5px;">
                    <i class="far fa-calendar-alt"></i>
                </span>
            </div>
            <select id="semana" class="form-control form-control-sm text-center input-datos-manual-custom"
                    style="padding-left:50px">
                <option value="">Semana</option>
            </select>
        </div>
        <div class="col-md-3 colsm-12 col-xs-12">
            <div class="input-group-prepend">
                <span class="input-group-text bg-silver-dark-custom all-round icon-select-custom"
                      style="left: 5px;">
                    <i class="far fa-calendar-alt"></i>
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
        <div class="col-md-3 colsm-12 col-xs-12">
            <div class="input-group-prepend">
                <span class="input-group-text bg-silver-dark-custom all-round icon-select-custom"
                      style="left: 5px;">
                    <i class="far fa-calendar-alt"></i>
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
            <label class="label label-sm">Área</label>
            <input type="number" id="area" name="area" required
                   class="form-control form-control-sm text-center input-datos-manual-custom">
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <label class="label label-sm">Tallos cosechados</label>
            <input type="number" id="tallos_cosechados" name="tallos_cosechados" required
                   class="form-control form-control-sm text-center input-datos-manual-custom">
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <label class="label label-sm">Cajas exportadas</label>
            <input type="number" id="cajas_exportadas" name="cajas_exportadas" required
                   class="form-control form-control-sm text-center input-datos-manual-custom">
        </div>
        <div class="col-md-2 col-sm-6 col-xs-6">
            <label class="label label-sm">Calibre</label>
            <input type="number" id="calibre" name="calibre" required
                   class="form-control form-control-sm text-center input-datos-manual-custom">
        </div>
        <div class="col-md-2 col-sm-6 col-xs-6">
            <label class="label label-sm">Ventas totales</label>
            <input type="number" id="ventas-totales" name="ventas-totales" required
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
            console.log("hola2");
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
                $.each(response,function(i,j){
                    $("select#select_variedad").append("<option class='option_dinamic' value='"+j.id_variedad+"'>"+j.nombre+"</option>");
                });
            }
        }).always(function(){
            //load(false);
        });
    });
</script>

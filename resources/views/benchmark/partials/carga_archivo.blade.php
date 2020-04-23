<form id="form-excel" class="mt-4">
    <div class="form-group">
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" name="archivo_excel" required>
                <label class="custom-file-label" for="customFile">Seleccione el archivo a subir</label>
            </div>
            <div class="input-group-append">
                <a href="{{url('formato_carga_datos.xlsx')}}" class="btn btn-success">
                    <i class="fas fa-download"></i> Formato
                </a>
            </div>
        </div>
    </div>
    <div class="text-center">
        <button type="button" class="btn btn-sm btn-secondary" onclick="close_dialog()">
            <i class="fas fa-ban"></i> Cerrar
        </button>
        <button type="button" class="btn btn-sm btn-success" id="btn_upload_excel">
            <i class="fas fa-save"></i> Guardar
        </button>
    </div>
</form>
<script>
    $("#btn_upload_excel").click(function(){
        if($("#form-excel").valid()){
            content = "<div class='alert alert-info text-light text-center w-100'>"
                +"Desea subir los datos cargados en el archivo?" +
                "</div>";

            confirmar(content, function () {
                load();
                var formData = new FormData($("#form-excel")[0]);
                $.ajax({
                    url: '{{url('benchmark/store_data_file')}}',
                    type: 'POST',
                    data: formData,
                    success: function(response){
                        if(response.success){
                            response.alert == 1
                                ? class_alert ='alert-success'
                                : class_alert ='alert-warning';
                            content = "<div class='alert "+class_alert+" w-100 overflow-auto' role='alert'> "+response.msg+"</div>";
                            title = 'El archivo se procesó con éxito';
                            $.alert({
                                title: title,
                                content: content,
                                icon: 'fas fa-check',
                                type: response.alert == 1 ? 'green' : 'orange',
                                titleClass : response.alert == 1 ? 'text-success' : 'text-warning',
                                theme: 'light',
                                columnClass: 'col-md-6',
                                onClose: function () {
                                    close_dialog();
                                    location.reload();
                                },
                            });
                        }else{
                            error_request(response.msg);
                        }
                    },
                    processData: false,
                    contentType: false,
                }).always(function(){
                    load(false);
                });
            });
        }
    });


</script>

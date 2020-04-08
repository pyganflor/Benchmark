<form id="form-excel" class="mt-4">
    <div class="form-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" required>
            <label class="custom-file-label" for="customFile">Seleccione el archivo a subir</label>
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
            console.log("hola1");
        }
    });


</script>

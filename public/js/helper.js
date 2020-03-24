$(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        error: function( jqXHR, textStatus, errorThrown ) {
            if (jqXHR.status === 0) {
                error_request('Not connect: Verify Network.');
                setTimeout(function () {
                    $("div.jconfirm-open").remove();
                },4000);
            } else if (jqXHR.status == 404) {
                error_request('Página solicitada no encontrada [404].');
            } else if (jqXHR.status == 500) {
                error_request('Error interno del servidor [500].<br/> Error: '+jqXHR.responseJSON.message
                    +'<br/> Mensaje: '+jqXHR.responseJSON.file+'<br/> Línea: '+jqXHR.responseJSON.line);
            } else if (textStatus === 'parsererror') {
                error_request('El JSON solicitado falló.');
            } else if (textStatus === 'timeout') {
                error_request('Error de tiempo de espera.');
            } else if (textStatus === 'abort') {
                error_request('Petición ajax abortada.');
            } else {
                error_request('Error desconcido: ' + jqXHR.responseText);
            }

        }
    });
});

function error_request(msj){
    content = "<div class='alert alert-danger w-100 overflow-auto' role='alert'>"
        + msj +
        "</div>";

    title = '<span class="text-danger">Hubo un error en la petición realizada al servidor</span>';

    $.alert({
        title: title,
        content: content,
        icon: 'fa fa-warning',
        type: 'red',
        titleClass : 'blue',
        theme: 'light',
        columnClass: 'col-md-12',
        onClose: function () {

        },
    });
}

function load_view_in_modal(data,f){
    $.confirm({
        closeIcon: true,
        closeIconClass: 'fas fa-times',
        animation: 'rotateY',
        closeAnimation: 'rotateYR',
        columnClass: data.col,
        titleClass : data.titleClass,
        draggable :true,
        icon : data.iconTitle,
        content: function () {
            var self = this;
            return $.ajax({
                url: data.url,
                method: data.method,
                data : data.datos
            }).done(function (response) {
                self.setContent(response);
                self.setTitle(data.title);
            }).fail(function(){
                self.setContent('Hubo un error en ka petición');
            });
        },
        buttons: {
            Guardar: {
                text : '<i class="fas fa-save"></i> Guardar',
                btnClass: 'btn-success',
                action: function () {
                    if(f!= undefined)
                        f();
                }
            },
            Cancelar: {
                text : '<i class="fas fa-ban"></i> Cancelar',
                btnClass: 'btn-default',
                action : function () {
                    $.alert({
                        title: 'Accion cancelada',
                        icon : 'fas fa-exclamation-circle',
                        titleClass : 'text-red',
                        content:''
                    });
                }
            },
        }
    });
}

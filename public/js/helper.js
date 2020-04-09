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

    jQuery.extend(jQuery.validator.messages, {
        required: "Este campo es requerido.",
        remote: "Por favor arregla este campo.",
        email: "Ingrese un correo válido.",
        url: "Ingrese una URL válida.",
        date: "Ingrese una fecha válida.",
        dateISO: "Please enter a valid date (ISO).",
        number: "Ingrese un número válido.",
        digits: "Por favor ingrese solo dígitos.",
        creditcard: "Por favor, introduzca un número de tarjeta de crédito válida.",
        equalTo: "Por favor, introduzca el mismo valor de nuevo.",
        accept: "Cargue un archivo con extensión válida",
        maxlength: jQuery.validator.format("Debe ingresar no mas de {0} caracteres."),
        minlength: jQuery.validator.format("Debe ingresar no menos de {0} caracteres."),
        rangelength: jQuery.validator.format("Por favor, introduzca un valor entre {0} y {1} caracteres de largo."),
        range: jQuery.validator.format("Por favor, introduzca un valor entre {0} y {1}."),
        max: jQuery.validator.format("Por favor ingrese un valor menor o igual a {0}."),
        min: jQuery.validator.format("Por favor ingrese un valor mayor o igual a {0}.")
    });
});

function load(show=true){

}

function error_request(msg){
    content = "<div class='alert alert-danger text-center w-100 overflow-auto' role='alert'>"
                  + msg +
              "</div>";

    title = '<span class="text-danger ">Hubo un error en la petición realizada al servidor</span>';

    $.alert({
        title: title,
        content: content,
        icon: 'fa fa-warning',
        type: 'red',
        titleClass : 'blue',
        theme: 'light',
        columnClass: 'col-md-6',
        onClose: function () {

        },
    });
}

function load_form_in_modal(data){
    $.dialog({
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
                self.setContent('Hubo un error en la petición');
            });
        }
    });
}


function load_view(data){
    load();
    $.ajax({
        url: data.url,
        type: data.type,
        data : data.datos,
        success: function(response){
            $("#"+data.id).html(response);
        }
    }).always(function(){
        load(false);
    });
}

function request_ajax(data,f){
    load();
    $.ajax({
        url: data.url,
        type: data.type,
        data : data.datos,
        success: function(response){
            console.log(response);
           if(response.success){
               content = "<div class='alert alert-success w-100 text-center overflow-auto' role='alert'> "+response.msg+"</div>";
               title = 'La accion se ha realizado con éxito';
               $.alert({
                   title: title,
                   content: content,
                   icon: 'fas fa-check',
                   type: 'green',
                   titleClass : 'text-success',
                   theme: 'light',
                   columnClass: 'col-md-6',
                   onClose: function () {
                       if(f!=undefined)
                           f();
                   },
               });
           }else{
               error_request(response.msg);
           }
        }
    }).always(function(){
        load(false);
    });
}

function confirmar(content,f) {
    $.confirm({
        title: "<i class='fas fa-exclamation-triangle'></i> Confirmar",
        content: content,
        titleClass :'text-info',
        type: 'blue',
        buttons: {
            Confirmar: {
                btnClass: 'btn btn-success',
                icon: 'far fa-save',
                action: function(){
                    if(f!=undefined)
                        f();
                }
            },
            Cancelar : function () {
                $.alert('Acción cancelada!')
            },
        }
    });
}

function close_dialog(){
    $(".jconfirm").remove();
}

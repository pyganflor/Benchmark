<script>

    function enviar_correo(admin=false,id) {

        content = "<div class='alert alert-info text-light text-center w-100'>"
            + "Esta seguro que desea crear este usuario y enviar los accesos al correo ingresado?" +
            "</div>";
        confirmar(content, function () {
            correo = $("#" + id);
            data = {
                url: '{{url('enviar_correo')}}',
                type: 'POST',
                datos: {
                    correo: correo.val(),
                    admin: admin
                }
            };
            request_ajax(data, function () {
                correo.val('');
            });
        });
    }


    function actualizar_acessos(){

        content = "<div class='alert alert-info text-light text-center w-100'>"
                    + "Esta seguro que desea actualizar los accesos?, la sesión se cerrará y deberá iniciar sesión con los nuevos accesos" +
                  "</div>";
        confirmar(content,function(){
            contrasena = $("#contrasena");
            usuario = $("#usuario");
            data={
                url : '{{url('actualizar_accesos')}}',
                type: 'POST',
                datos : {
                    contrasena : contrasena.val(),
                    usuario : usuario.val()
                }
            };
            request_ajax(data,function(){
                contrasena.val('');
                usuario.val('');
            });
        });

    }

</script>

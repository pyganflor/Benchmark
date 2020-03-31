<script>

    function enviar_correo(admin=false,id){
        correo = $("#"+id);
        data={
            url : '{{url('enviar_correo')}}',
            type: 'POST',
            datos : {
                correo : correo.val(),
                admin : admin
            }
        };
        request_ajax(data,function(){
            correo.val('');
        });
    }
</script>

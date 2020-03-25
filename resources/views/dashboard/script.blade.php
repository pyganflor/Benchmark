<script>

    ver_indicadores();

    function ver_indicadores(){
        data={
            url : '{{url('indicadores')}}',
            type : 'GET',
            id  : 'div_indicadores',
            datos :{}
        };
        load_view(data);
    }

</script>

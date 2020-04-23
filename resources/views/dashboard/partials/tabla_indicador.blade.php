<table class="table table-bordered ">
    @foreach($data as $x => $dat)
        <tr class="{{$x=='semanas' ? 'bg-table-indicador' : ''}}">
        @foreach($dat as $d)
            <td class="text-center"><b>{{$d }}</b></td>
        @endforeach
        </tr>
    @endforeach
</table>

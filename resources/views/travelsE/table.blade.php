<table class="table table-responsive" id="travels-table">
    <thead>
        <th>Id Actividad</th>
        <th>Nombre Salida</th>
        <th>Descripcion</th>
        <th>Asignatura</th>
        <th>Estado</th>
        <th>Programa</th>
        <th colspan="3">Accion</th>
    </thead>
    <tbody>
    @foreach($travels as $travel)
        <tr>
            <td>{!! $travel->idActivity !!}</td>
            <td>{!! $travel->nameTravel !!}</td>
            <td>{!! $travel->description !!}</td>
            <td>{!! $travel->course !!}</td>
            <td>{!! $travel->state !!}</td>
            <td>{!! $travel->programme !!}</td>
            <td>
                {!! Form::open(['route' => ['travels.destroy', $travel->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
    
                    <a href="{!! route('travelsE.edit', [$travel->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
               
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
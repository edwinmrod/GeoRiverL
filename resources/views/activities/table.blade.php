<table class="table table-responsive" id="activities-table">
    <thead>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Coordenadas (Lat Long)</th>
        <th colspan="3">Herramientas</th>
    </thead>
    <tbody>
    @foreach($activities as $activity)
        <tr>
            <td>{!! $activity->nameActivity !!}</td>
            <td>{!! $travel->description !!}</td>
            <td>{!! $activity->coordinateActivity !!}</td>
            <td>
                {!! Form::open(['route' => ['activities.destroy', $activity->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('activities.show', [$activity->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('activities.edit', [$activity->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Esta seguro de eliminar la actividad?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
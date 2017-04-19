<table class="table table-responsive" id="locations-table">
    <thead>
        <th>Nombre del lugar</th>
        <th>Coordenadas (Lat Long) </th>
        <th colspan="3">Herramientas</th>
    </thead>
    <tbody>
    @foreach($locations as $location)
    
        <tr>
            <td>{!! $location->nameLocation !!}</td>
            <td>{!! $location->coordinate !!}</td>
            <td>
                {!! Form::open(['route' => ['locations.destroy', $location->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('locations.show', [$location->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('locations.edit', [$location->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Esta seguro de eliminar el lugar?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
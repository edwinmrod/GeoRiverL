<table class="table table-responsive" id="perfil-table">
    <thead>
        <th>Nombre</th>
        <th>Correo</th>
        <th colspan="3">Herramienta</th>
    </thead>
    <tbody>
        <tr>
            <td>{!! $users->name !!}</td>
            <td>{!! $users->email !!}</td>
            <td>
            <div class='btn-group'>
                <a href="{!! route('perfil.show', [$users->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
			     <a href="{!! route('perfil.edit', [$users->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
            </div>
            </td>
        </tr>	
    </tbody>
</table>
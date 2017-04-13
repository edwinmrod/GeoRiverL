<table class="table table-responsive" id="perfil-table">
    <thead>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Rol</th>
    </thead>
    <tbody>
   
        <tr>
            <td>{!! $users->name !!}</td>
            <td>{!! $users->email !!}</td>
            <td>{!! $users->role !!}</td>
			<td> <a href="{!! route('perfil.edit', [$users->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> <td>
        </tr>
		
		
 
    </tbody>
</table>
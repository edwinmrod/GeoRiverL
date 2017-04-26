
<li class="{{ Request::is('travels*') ? 'active' : '' }}">
    <a href="{!! route('travels.index') !!}"><i class="fa fa-edit"></i><span>Salidas</span></a>
</li>

<li class="{{ Request::is('activities*') ? 'active' : '' }}">
    <a href="{!! route('activities.index') !!}"><i class="fa fa-edit"></i><span>Actividades</span></a>
</li>

<li class="{{ Request::is('variables*') ? 'active' : '' }}">
    <a href="{!! route('variables.index') !!}"><i class="fa fa-edit"></i><span>variables</span></a>
</li>

<li class="{{ Request::is('map*') ? 'active' : '' }}">
    <a href="{!! route('map.index') !!}"><i class="fa fa-edit"></i><span>Mapa</span></a>
</li> 

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Usuarios</span></a>
</li>

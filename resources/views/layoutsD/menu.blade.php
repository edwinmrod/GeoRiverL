
<li class="{{ Request::is('travels*') ? 'active' : '' }}">
    <a href="{!! route('travelsD.index') !!}"><i class="fa fa-edit"></i><span>Salidas</span></a>
</li>

<li class="{{ Request::is('activities*') ? 'active' : '' }}">
    <a href="{!! route('activitiesD.index') !!}"><i class="fa fa-edit"></i><span>Actividades</span></a>
</li>


<li class="{{ Request::is('variables*') ? 'active' : '' }}">
    <a href="{!! route('variablesD.index') !!}"><i class="fa fa-edit"></i><span>variables</span></a>
</li>

<li class="{{ Request::is('perfil*') ? 'active' : '' }}">
    <a href="{!! route('perfil.index') !!}"><i class="fa fa-edit"></i><span>Perfil</span></a>
</li>

<li class="{{ Request::is('locations*') ? 'active' : '' }}">
    <a href="{!! route('locations.index') !!}"><i class="fa fa-edit"></i><span>Lugares</span></a>
</li>

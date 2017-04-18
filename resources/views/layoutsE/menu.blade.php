
<li class="{{ Request::is('travels*') ? 'active' : '' }}">
    <a href="{!! route('travelsE.index') !!}"><i class="fa fa-edit"></i><span>Salidas</span></a>
</li>


<!--<li class="{{ Request::is('perfil*') ? 'active' : '' }}">
    <a href="{!! route('perfil.index') !!}"><i class="fa fa-edit"></i><span>Perfil</span></a>
</li>-->


<li class="{{ Request::is('travelsRegistered*') ? 'active' : '' }}">
    <a href="{!! route('travelsRegistered.index') !!}"><i class="fa fa-edit"></i><span>Salidas Inscritas</span></a>
</li>


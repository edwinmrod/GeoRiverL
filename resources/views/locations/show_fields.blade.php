<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $location->id !!}</p>
</div>

<!-- Namelocation Field -->
<div class="form-group">
    {!! Form::label('nameLocation', 'Nombre del Lugar:') !!}
    <p>{!! $location->nameLocation !!}</p>
</div>

<!-- Coordinate Field -->
<div class="form-group">
    {!! Form::label('coordinate', 'Coordenada (Lat Long): ') !!}
    <p> {!! $location->latitude !!} </p> 
    <p> {!! $location->longitude !!} </p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Creado El:') !!}
    <p>{!! $location->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Modificado el:') !!}
    <p>{!! $location->updated_at !!}</p>
</div>
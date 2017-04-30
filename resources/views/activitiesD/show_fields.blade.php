<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $activity->id !!}</p>
</div>

<!-- Nameactivity Field -->
<div class="form-group">
    {!! Form::label('nameActivity', 'Nombre de la actividad:') !!}
    <p>{!! $activity->nameActivity !!}</p>
</div>

<!-- Coordinateactivity Field -->
<div class="form-group">
    {!! Form::label('coordinateActivity', 'Coordenada (Lat Long):') !!}
    <p>{!! $activity-> latitude!!}</p>
    <p>{!! $activity-> longitude!!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Creado el:') !!}
    <p>{!! $activity->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Modificado el:') !!}
    <p>{!! $activity->updated_at !!}</p>
</div>


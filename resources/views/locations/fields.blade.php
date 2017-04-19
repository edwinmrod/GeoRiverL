<!-- Namelocation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nameLocation', 'Nombre del Lugar:') !!}
    {!! Form::text('nameLocation', null, ['class' => 'form-control']) !!}
</div>

<!-- Coordinate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('coordinate', 'Coordenada (Lat Long):') !!}
    {!! Form::number('lat',null,['class' => 'form-control','step'=>'any'])!!}
  	{!! Form::number('long',null,['class' => 'form-control','step'=>'any'])!!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('locations.index') !!}" class="btn btn-default">Cancelar</a>
</div>

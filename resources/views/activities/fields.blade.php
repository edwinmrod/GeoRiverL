<!-- Nameactivity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nameActivity', 'Nombre:') !!}
    {!! Form::text('nameActivity', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Descripcion:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Coordinateactivity Field -->
<div class="form-group col-sm-6">
     <thead>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Coordenadas (Lat Long)</th>
        <th colspan="3">Herramientas</th>
    </thead>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('activities.index') !!}" class="btn btn-default">Cancelar</a>
</div>

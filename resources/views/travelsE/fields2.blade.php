
<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Clave:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Inscribirse', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('travelsE.index') !!}" class="btn btn-default">Cancelar</a>
</div>
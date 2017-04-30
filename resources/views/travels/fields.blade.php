
<!-- Nametravel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nameTravel', 'Nombre de la Salida:') !!}
    {!! Form::text('nameTravel', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field-->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Descripcion:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Course Field -->
<div class="form-group col-sm-6">
    {!! Form::label('course', 'Asignatura:') !!}
    {!! Form::text('course', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Clave:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state', 'Estado:') !!}
    {!! Form::text('state', null, ['class' => 'form-control']) !!}
</div>

<!-- Programme Field -->
<div class="form-group col-sm-6">
    {!! Form::label('programme', 'Programa:') !!}
    {!! Form::text('programme', null, ['class' => 'form-control']) !!}
</div>


<div class="activity col-sm-12">
        
        <h1>
            Actividades
        </h1>
        {!! Form::label('nameActivity', 'Nombre:') !!}
        {!! Form::label('description', 'Descripcion:') !!}
        {!! Form::label('coordinateActivity', 'Coordenadas:') !!}
        <a href="#" class="addRow"><i class="glyphicon glyphicon-plus"></i></a>
</div>
     
<script type="text/javascript">
    $('.addRow').on('click',function(){
        addRow();
    });
    function addRow()
    {
        var tr='<p> "hola"</p>';
        $('.activity').append(tr);
        //alert('prueba');            
    }
</script>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('travels.index') !!}" class="btn btn-default">Cancelar</a>
</div>

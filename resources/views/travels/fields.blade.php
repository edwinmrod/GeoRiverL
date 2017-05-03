<form enctype='application/json'>
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
            Actividades    <a href="#" class="addRow"><i class="glyphicon glyphicon-plus"></i></a>
        </h1>
      
      
</div>
     
<script type="text/javascript">
    $('.addRow').on('click',function(){
        addRow();
    });
    function addRow()
    {
	var activity=' <h3><div class="form-group col-sm-12"> Ingrese Actividad</h3> </div>'
	var NActivity='<div class="form-group col-sm-6"> {!! Form::label('nameActivity', 'Nombre de la Actividad:') !!} {!! Form::text('nameActivity[]', null, ['class' => 'form-control']) !!}</div>';
    var l1Activity='<div class="form-group col-sm-6"> {!! Form::label('latitudeActivity', 'latitude') !!} {!! Form::text('latitude[]', null, ['class' => 'form-control']) !!}</div>';
	 var l2Activity='<div class="form-group col-sm-6"> {!! Form::label('longitudActivity', 'longitud') !!} {!! Form::text('longitude[]', null, ['class' => 'form-control']) !!}</div>';
    var DActivity='<div class="form-group col-sm-12 col-lg-12">{!! Form::label('descriptionActivity', 'DescriptionActivity:') !!}{!! Form::textarea('descriptionActivity[]', null, ['class' => 'form-control']) !!}   <hr { border-width: 20px; background-color:#000000;} /div>';
	   var tr=activity+NActivity+l1Activity+l2Activity+DActivity;
        $('.activity').append(tr);
        //alert('prueba');            
    }
</script>




<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('travels.index') !!}" class="btn btn-default">Cancelar</a>
</div>

</form>

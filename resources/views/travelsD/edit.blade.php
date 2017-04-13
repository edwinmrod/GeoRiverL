@extends('layoutsD.app')

@section('content')
    <section class="content-header">
        <h1>
            Salida
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($travel, ['route' => ['travels.update', $travel->id], 'method' => 'patch']) !!}

                        @include('travelsD.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
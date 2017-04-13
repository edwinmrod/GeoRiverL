@extends('layoutsD.app')

@section('content')
    <section class="content-header">
        <h1>
            Variable
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'variablesD.store']) !!}

                        @include('variablesD.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

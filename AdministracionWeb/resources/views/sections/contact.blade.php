@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Nuevo Mensaje</h1>                       
            </div>

            <div class="panel-body">                
                @include('partials.alerts.errors')
                <!-- success messages -->
                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                         {{ Session::get('flash_message') }}
                    </div>
                @endif
                <!-- -->
                {!! Form::open(['url' => 'mensajes']) !!}

                <div class="form-group">
                    {!! Form::label('from', 'De:', ['class' => 'control-label enfocar']) !!}
                    {!! Form::text('from', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('asunto', 'Asunto:', ['class' => 'control-label enfocar']) !!}
                    {!! Form::text('asunto', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('to', 'Para:', ['class' => 'control-label']) !!}
                    {!! Form::text('to', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                    {!! Form::label('body', 'Mensaje:', ['class' => 'control-label']) !!}
                    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                    @if ($errors->has('body'))
                        <span class="help-block">
                            <strong>{{ $errors->first('body') }}</strong>
                        </span>
                    @endif
                </div>

                {!! Form::submit('Aceptar', ['class' => 'btn btn-success'])  !!}

                <div class="pull-right">
                    <a href="{{ url('/') }}" class="btn btn-danger"></i>Cancel</a>
                </div>

                {!! Form::close() !!} 
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/funciones/focus.js') !!}
	{!! Html::script('js/layouts/baseData.js') !!}
@endsection
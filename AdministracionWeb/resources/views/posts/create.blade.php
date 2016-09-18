@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Nueva Noticia</h1>                       
            </div>

            <div class="panel-body">                
                <!-- success messages -->
                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                         {{ Session::get('flash_message') }}
                    </div>
                @endif
                <!-- -->
                {!! Form::open(['url' => 'posts']) !!}

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    {!! Form::label('title', 'T&iacute;tulo:', ['class' => 'control-label']) !!}
                    {!! Form::text('title', null, ['class' => 'form-control enfocar']) !!}
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                    {!! Form::label('content', 'Contenido:', ['class' => 'control-label']) !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                    @if ($errors->has('content'))
                        <span class="help-block">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                    @endif
                </div>


                {!! Form::submit('Aceptar', ['class' => 'btn btn-success'])  !!}

                <div class="pull-right">
                    <a href="{{ route('posts.index') }}" class="btn btn-danger"></i>Cancel</a>
                </div>

                {!! Form::close() !!} 
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/funciones/focus.js') !!}
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">        
        @include('partials.alerts.js_confirm')  
        <!-- success messages -->
        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif
        @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
         <!-- Current noticia -->
            <div class="panel panel-default">
                <div class="panel-heading">
                     <h1>
                        Noticias
                        <div class="pull-right">
                            {!! Form::open([
                                'method' => 'GET',
                                'route' => ['posts.create'],
                                'class' => 'navbar-form navbar-left pull-left'                                                         
                            ]) !!}
                            {!! Form::submit('Nueva Noticia', ['class' => 'btn btn-success']) !!}
                            {!! Form::close() !!} 
                        </div> 
                    </h1>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        {!! Form::open([
                            'method' => 'GET',
                            'route' => ['posts.index'],
                            'class' => 'navbar-form',
                            'role' => 'search'                                
                        ]) !!}
                        {!! Form::text('title', '', ['class' => 'form-control enfocar', 'placeholder' => 'Titulo']) !!}                        
                        {!! Form::submit('Buscar', ['class' => 'btn btn-default']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>T&iacute;tulo</th>
                            <!-- <th>&nbsp;</th>-->
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td class="table-text"><div>{{ $post->title }}</div></td>
                                    <!-- Task Edit Button -->
                                    <td>
                                        {!! Form::open([
                                            'method' => 'GET',
                                            'route' => ['posts.edit', $post->id]
                                        ]) !!}
                                        {!! Form::button('Editar <i class="fa fa-pencil"></i>', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                    <!-- Task Delete Button -->
                                    <td>
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['posts.destroy', $post->id],
                                            'onsubmit' => 'return ConfirmDelete()'                  
                                        ]) !!}

                                        {!! Form::button('Eliminar <i class="fa fa-trash"></i>', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}

                                        {!! Form::close() !!}                                           
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>                
            </div>
        </div>    
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/funciones/focus.js') !!}
@endsection
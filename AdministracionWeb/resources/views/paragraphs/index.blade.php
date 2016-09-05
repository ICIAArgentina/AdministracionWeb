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
         <!-- Current paragraph -->
            <div class="panel panel-default">
                <div class="panel-heading">
                     <h1>
                        P&aacute;rrafos
                        <div class="pull-right">
                            <!-- TRIGGER THE MODAL WITH A BUTTON -->
                            {!! Form::button('Nuevo P&aacute;rrafo  <i class="fa fa-bolt"></i>', ['class' => 'btn btn-success btn-create-paragraph', 'type' => 'submit', 'data-toggle' => 'modal', 'data-target' => '#createModal']) !!}
                        </div> 
                    </h1>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        {!! Form::open([
                            'method' => 'GET',
                            'route' => ['paragraphs.index'],
                            'class' => 'navbar-form',
                            'role' => 'search'                                
                        ]) !!}
                        {!! Form::label('section_id', 'Secci&oacute;n:', ['class' => 'control-label']) !!}
                        {!! Form::select('section_id', $sections, $section_id, ['class' => 'form-control enfocar']) !!}                        
                        {!! Form::submit('Buscar', ['class' => 'btn btn-default']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>Orden</th>
                            <th>Contenido</th>
                            <!-- <th>&nbsp;</th>-->
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach ($paragraphs as $paragraph)
                                <tr>
                                    <td class="table-text"><div>{{ $paragraph->order }}</div></td>
                                    <td class="table-text"><div>{{ $paragraph->content }}</div></td>
                                    <td>
                                        <!-- TRIGGER THE MODAL WITH A BUTTON -->
                                        {!! Form::button('Editar <i class="fa fa-pencil"></i>', ['class' => 'btn btn-primary btn-edit-paragraph', 'type' => 'submit', 'data-id' => $paragraph->id,  'data-toggle' => 'modal', 'data-target' => '#editModal']) !!}                                            
                                    </td>
                                    <!-- Task Delete Button -->
                                    <td>
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['paragraphs.destroy', $paragraph->id],
                                            'onsubmit' => 'return ConfirmDelete()'                  
                                        ]) !!}

                                        {!! Form::button('Delete <i class="fa fa-trash"></i>', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}

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
    @include('paragraphs.create')
    @include('paragraphs.edit')
@endsection

@section('scripts')
    {!! Html::script('js/funciones/focus.js') !!}
    {!! Html::script('js/paragraphs/edit.js') !!}
    {!! Html::script('js/paragraphs/create.js') !!}
@endsection
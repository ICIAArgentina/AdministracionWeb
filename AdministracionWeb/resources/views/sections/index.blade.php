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
         <!-- Current section -->
            <div class="panel panel-default">
                <div class="panel-heading">
                     <h1>
                        Secciones
                        <div class="pull-right">
                            <!-- TRIGGER THE MODAL WITH A BUTTON -->
                            {!! Form::button('Nueva Secci&oacute;n <i class="fa fa-bolt"></i>', ['class' => 'btn btn-success btn-create-section', 'type' => 'submit', 'data-toggle' => 'modal', 'data-target' => '#createModal']) !!}
                        </div> 
                    </h1>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        {!! Form::open([
                            'method' => 'GET',
                            'route' => ['sections.index'],
                            'class' => 'navbar-form',
                            'role' => 'search'                                
                        ]) !!}
                        {!! Form::text('description', '', ['class' => 'form-control enfocar', 'placeholder' => 'Descripci&oacute;n']) !!}                        
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
                            @foreach ($sections as $section)
                                <tr>
                                    <td class="table-text"><div>{{ $section->title }}</div></td>
                                    <td>
                                        <!-- TRIGGER THE MODAL WITH A BUTTON -->
                                        {!! Form::button('Editar <i class="fa fa-pencil"></i>', ['class' => 'btn btn-primary btn-edit-section', 'type' => 'submit', 'data-id' => $section->id,  'data-toggle' => 'modal', 'data-target' => '#editModal']) !!}                                            
                                    </td>
                                    <!-- Task Delete Button -->
                                    <td>
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['sections.destroy', $section->id],
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
    @include('sections.create')
    @include('sections.edit')
@endsection

@section('scripts')
    {!! Html::script('js/funciones/focus.js') !!}
    {!! Html::script('js/sections/edit.js') !!}
    {!! Html::script('js/sections/create.js') !!}
@endsection
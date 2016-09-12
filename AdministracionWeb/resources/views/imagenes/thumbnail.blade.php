@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
    	<div class="panel-heading">
    		<h1>
                Im&aacute;genes de la Portada
                <div class="pull-right">
                    <!-- TRIGGER THE MODAL WITH A BUTTON -->
                    {!! Form::button('Nueva Imagen <i class="fa fa-upload"></i>', ['class' => 'btn btn-success btn-upload', 'type' => 'submit', 'data-toggle' => 'modal', 'data-target' => '#uploadModal']) !!}
                </div> 
            </h1>
    	</div>
    	<div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                        <th>&nbsp;</th>
                        <!-- <th>&nbsp;</th>-->
                        <th>&nbsp;</th>
                    </thead>
                    <tbody>
    				@foreach (File::allFiles('img/portada/') as $key => $file)
                    <tr>
                        <td class="table-text">
    						<div class="row">
    							<div class="col-sm-6 col-md-4">
    								<div class="thumbnail">
    									<img src="{{ asset('img/portada/'.$file->getRelativePathName()) }}" alt="foto de portada" class="img-responsive center-block">
    								</div>
    							</div>
    						</div>
    					</td>
                        <td>
                            <!-- TRIGGER THE MODAL WITH A BUTTON -->
                            {!! Form::button('Eliminar <i class="fa fa-trash"></i>', ['class' => 'btn btn-danger btn-delete-img', 'type' => 'submit', 'data-path' => 'img/portada/'.$file->getRelativePathName(),  'data-toggle' => 'modal', 'data-target' => '#confirmModal']) !!}                                            
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
    	</div>
    </div>

    @include('imagenes.confirmmodal')
    @include('imagenes.uploadmodal')

@endsection

@section('scripts')
	{!! Html::script('js/img/modal.js') !!}
@endsection
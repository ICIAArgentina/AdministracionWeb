@extends('layouts.app')

@section('content')
<div class="about-section">
	<div class="text-content">
		<div class="span7 offset1">
			@if(Session::has('success'))
				<div class="alert-box success">
					<h3>{!! Session::get('success') !!}</h3>
				</div>
			@endif

			<div class="secure">
				<h2>Seleccione una imagen para subir</h2>
				<p>&Eacute;sta imagen formar&aacute; parte de las im&aacutegenes de la portada</p>
			</div>
			{!! Form::open(array('url'=>'apply/upload','method'=>'POST', 'files'=>true)) !!}
				<div class="control-group">
					<div class="controls">
						{!! Form::file('image') !!}
						<p class="errors">{!!$errors->first('image')!!}</p>
						@if(Session::has('error'))
							<p class="errors">{!! Session::get('error') !!}</p>
						@endif
					</div>
				</div>
				<div id="success"> </div>
				{!! Form::submit('Subir imagen', array('class'=>'send-btn from-control')) !!}
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
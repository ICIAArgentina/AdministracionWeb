@extends('layouts.app')

@section('content')
	@include('layouts.carousel')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>{{ $section->title }}</h1>                       
        </div>

        <div class="panel-body"> 
			@foreach($section->paragraphs as $paragraph)
				<p>
					{{ $paragraph->content }}
				</p>
			@endforeach
		</div>
	</div>
@endsection
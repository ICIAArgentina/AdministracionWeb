@extends('layouts.app')

@section('content')
	@include('layouts.carousel')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>{{ $section->title }}</h1>                       
            </div>

            <div class="panel-body"> 
				@foreach($posts as $post)
			        <div class="panel panel-primary">
			            <div class="panel-heading">
			                <h1>{{ $post->title }}</h1>                       
			            </div>

			            <div class="panel-body"> 
			            	@include('sections.posts.carousel')
							<div>
								{{ $post->content }}
							</div>
						</div>
					</div>
				@endforeach
			</div>
            <div>
                {!! $posts->render() !!}
            </div>
		</div>
@endsection

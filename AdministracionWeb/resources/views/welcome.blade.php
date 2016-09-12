@extends('layouts.app')

@section('content')
    @include('partials.alerts.js_confirm')  
    <!-- success messages -->
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif

    @include('layouts.carousel')
    @include('layouts.footer')
@endsection
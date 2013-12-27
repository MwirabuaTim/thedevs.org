@extends('layouts.scaffold')

{{-- Web site Title --}}
@section('title')
	@parent
	Page Not Found
@stop

@section('css')
	@include('partials.errorcss')
@stop

@section('js')
	@include('partials.errorjs')
@stop

@section('transparent')
	
	<div class="error-container">
        <h1>404</h1>
        
        <div id="www">:(</div>

		<hr>

		<p>
			This page is missing on our servers.
		</p>

		<p>
			Perhaps you would like to <a href="{{ URL::to('contactus'); }}">report this</a>?
		</p>
	</div>

@stop
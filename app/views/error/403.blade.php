@extends('layouts.scaffold')

{{-- Web site Title --}}
@section('title')
	@parent
	Access Forbidden
@stop

@section('css')
	@include('partials.errorcss')
@stop

@section('js')
	@include('partials.errorjs')
@stop

@section('transparent')
	<div class="error-container">
		<h1>403</h1>

		<div id="www">:(</div>

		<hr>

		<p>
			You don't have the necessary permissions to access to this page.
		</p>

		<p>
			Perhaps you would like to go to our <a href="{{ URL::route('home') }}">home page</a>?
		</p>
	</div>
@stop
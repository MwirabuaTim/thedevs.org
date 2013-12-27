@extends('layouts.scaffold')

{{-- Web site Title --}}
@section('title')
	@parent
	Scheduled Maintenance
@stop

@section('css')
	@include('partials.errorcss')
@stop

@section('js')
	@include('partials.errorjs')
@stop

@section('transparent')

	<div class="error-container">

	    <h1>503</h1>

	    <div id="www">:(</div>

	    <hr/>

		<p>
			We are under a scheduled maintenance and we'll be back shortly!
		</p>

	</div>
@stop
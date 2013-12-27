@extends('layouts.scaffold')

{{-- Web site Title --}}
@section('title')
	@parent
	Internal Server Error
@stop

@section('css')
	@include('partials.errorcss')
@stop

@section('js')
	@include('partials.errorjs')
@stop

@section('transparent')
	
	<div class="error-container">
	    <h1>500</h1>

	    <div id="www">:(</div>

		<?php $messages = array('Yainks!', 'Oh no!', 'Whoops!'); ?>

		<h1><?php echo $messages[mt_rand(0, 2)]; ?></h1>

		<hr>

		<p>
			An error just happened on our servers.
		</p>

		<p>
			Perhaps you would like to <a href="{{ URL::to('contactus'); }}">report this</a>?
		</p>
		
	</div>
@stop

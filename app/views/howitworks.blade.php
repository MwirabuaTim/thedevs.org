@extends('layouts.scaffold')

{{-- Web site Title --}}
@section('title')
@parent
:: How it Works
@stop

@section('css')
@stop

@section('main')
<div class="clearfix">
	<h3><span style="">How TheDevs.org Works</span></h3>

	<h4>Using TheDevs.org:</h4>
	
	<ol><li>
			<b>REGISTER:&nbsp;</b><a href="{{ URL::to('auth/signup') }}" class="_sign-up">Sign up</a>&nbsp;for a free account. Just need a name and email.</li>
		<li>
			<strong>SEARCH:</strong>&nbsp;Find Developers, Projects, Organisations, Events and Stories around the world.</li>
		<li>
			<strong>POST:</strong>&nbsp;Add your organisation, project, event or story.</li>
		<li>
			<strong>EVENTS:</strong>&nbsp;Meet physically to exchange ideas.</li>
	</ol>

	<h4>Why TheDevs.org?</h4>

	<ul>
		<li>
			<strong>Devs need it:</strong> As Devs, we need to work together/collaborate</li>
		<li>
			<strong>Global and local:</strong> You can use this tool from any corner of the world.</li>
		<li>
			<strong>Free:</strong> Free accounts, free to use. Simple enough.</li>
		<li>
			<strong>Powerful:</strong> Never not doubt the power of a tool that actually connects people</li>
	</ul>
</div>
@stop




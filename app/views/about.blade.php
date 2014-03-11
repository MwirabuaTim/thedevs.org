@extends('layouts.scaffold')

{{-- Page title --}}
@section('title')
About Us ::
@parent
@stop

{{-- Page content --}}
@section('main')


<fieldset class="_sweet-tooth">

	<legend class="_welcome">
		<span><a href="/about">Welcome to The Developers' Organization</a></span>
	</legend>

	@include('concept-doc')
	<!-- http://4html.net/Online-text-to-HTML-converter-831.html -->

</fieldset>

@stop

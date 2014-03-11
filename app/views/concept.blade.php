@extends('layouts.scaffold')

{{-- Page title --}}
@section('title')
Concept ::
@parent
@stop

@section('main')

<fieldset class="_sweet-tooth">

	<legend class="_welcome">
		<span>Welcome to The Developers' Organization</span>
	</legend>

	@include('concept-doc')
	<!-- http://4html.net/Online-text-to-HTML-converter-831.html -->

</fieldset>

@stop



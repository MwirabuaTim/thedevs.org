@extends('layouts.scaffold')

@section('transparent')

@include('partials.mapnav')

<fieldset class="_sweet-tooth">

	<legend class="_welcome">
		<span>Welcome to The Developers' Organization<a href="/about"></a></span>
	</legend>

	<h2 class="_center">
		<!-- “Location-based Digital Hub For Developers” -->
		<!-- “Location-based Freelance Developer Marketplace” -->
		“Resources For Software Engineers”
	</h2>

	<hr>

<div class="hide">
		Mapping Technology Worldwide </br/>
		Developers, Organizations, Events, Projects &amp; Stories
</div>

</fieldset>

<div class="_addbtn _center _home">
    @if(!Sentry::check())
    <span class="_blade _aqua-hover _get-sign-up _right10" href="{{ URL::to('auth/signup') }}">&nbsp;+	Join&nbsp;</span>
	@endif
	<span class="_blade _aqua-hover _step1 _left10">Create</span>
</div>


@stop



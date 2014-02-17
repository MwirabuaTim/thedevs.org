@extends('layouts.scaffold')

@section('transparent')

@include('partials.mapnav')

<fieldset class="_sweet-tooth">

	<legend class="_welcome">
		<span>Welcome to The Developers' Organization</span>
	</legend>

	<h2 class="_center">
		“Location-Based Resource For Developers.”
	</h2>

	<hr>

<div class="hide">
		Mapping Technology Worldwide </br/>
		Developers, Organizations, Events, Projects &amp; Stories
</div>

</fieldset>

<div class="_addbtn _center _top10 _bottom10">
    <span class="_blade _aqua2pink _get-sign-up _right10" href="{{ URL::to('auth/signup') }}">&nbsp;+	Join&nbsp;</span>
	
	<span class="_blade _aqua2pink _step1 _left10">Create</span>
</div>

<a href="/" class="_inst _clearLS _hide">Delete Pending Post</a>
<!-- <a href="#" class="_inst _step3 pull-right _hide">Proceed Posting</a> -->

@stop



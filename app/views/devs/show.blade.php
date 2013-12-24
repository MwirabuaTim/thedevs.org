@extends('layouts.scaffold')

@section('main')

@if(Sentry::check())
<div class="_in-blocks">
	<h1 style="float: left;">{{{ $dev->first_name }}}&nbsp; {{{ $dev->last_name }}}</h1>
	<span class="_right">
		{{ link_to_route('devs.edit', 'Edit', array($dev->id), array('class' => 'btn btn-info')) }}
		@if(Sentry::getUser()->hasAccess('admin'))
			{{ link_to_route('admin', 'Admin', null, array('class' => 'btn btn-primary')) }}
		@endif
	</span>
	
</div>

<div class="_in-blocks dev">
	<div id="showmap"></div>
	<img class="_block" src="{{{ Sentry::getUser()->pic }}}" />
	<table class="_block _bio table table-striped table-bordered">
		<tbody>
			<tr><td>Location</td><td>{{{ Sentry::getUser()->location }}}</td></tr>
			<tr><td>Email</td><td>{{{ Sentry::getUser()->email }}}</td></tr>
			<tr><td>Phone</td><td>{{{ Sentry::getUser()->phone }}}</td></tr>
			<tr><td>Views</td><td>{{{ Sentry::getUser()->votes }}}</td></tr>
			<tr><td>Votes</td><td>{{{ Sentry::getUser()->views }}}</td></tr>
		</tbody>
	</table>
</div>

<p class="_center _f30">"<span class="_f30">{{{ $dev->elevator }}}</span>"</p>



<h4>About {{{ $dev->first_name }}}:</h4>
<div class="_about">
	@if(filter_var($dev->video, FILTER_VALIDATE_URL))
<!-- height="315" -->
	<div class="videoWrapper _left _right10">
		<div class="mediaBox">
		<!-- <div class="videoWrapper"> -->
			<iframe src="//www.youtube.com/embed/
			{{{ substr($dev->video, stripos($dev->video, 'v=')+2, strlen($dev->video)) }}}" 
			frameborder="0" allowfullscreen></iframe>
		<!-- </div> -->
		</div>
	</div>
	@endif

	{{ $dev->about }}

</div>

<a class="pull-left btn btn-warning" href="{{ URL::to('devs') }}">All Devs</a>
<span class="_right">
	@if(Request::path() == 'devs/'.Sentry::getUser()->id)
		{{ link_to_route('change-email', 'Change Email', null, array('class' => 'btn btn-primary')) }}
		{{ link_to_route('change-password', 'Change Password', null, array('class' => 'btn btn-primary')) }}
		{{ link_to_route('logout', 'Logout', null, array('class' => 'btn btn-primary')) }}
	
		
	@endif
</span>

@else
	<h4>You have to be logged in to see this.<h4>
@endif

@stop

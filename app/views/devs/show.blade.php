@extends('layouts.scaffold')

@section('main')

@if(Sentry::check())

<div class="_w100 _in-block">
	<h1 class="pull-left">{{ All::getName($dev) }}</h1>
	<span class="pull-right">

		{{ All::getPublicity($dev) }} 

		{{ All::getEditLink($dev) }}

		@if(Sentry::getUser()->hasAccess('admin'))<!--  admin link -->
			{{ link_to_route('admin', 'Admin', null, array('class' => 'btn btn-primary')) }}
		@endif

	</span>
	
</div>

<div class="_w100 _in-block">
	<div id="single-map"></div>
	{{ All::getImageLink($dev, '_profile-pic') }}
	<table class="_bio table table-striped table-bordered">
		<tbody>
			<tr><td>Skills</td><td>Comming soon...</td></tr>
			<tr><td>Email</td><td>{{{ $dev->email }}}</td></tr>
			<tr><td>Phone</td><td>{{{ $dev->phone }}}</td></tr>
			<!-- <tr><td>Views</td><td>{{{ $dev->votes }}}</td></tr> -->
			<!-- <tr><td>Votes</td><td>{{{ $dev->views }}}</td></tr> -->
		</tbody>
	</table>
</div>

<p class="_center _f30">"<span class="_f30">{{{ $dev->elevator }}}</span>"</p>



<h4>About {{{ $dev->first_name }}}:</h4>
<div class="_about">
	@if(filter_var($dev->video, FILTER_VALIDATE_URL))
<!-- height="315" -->
	<div class="vid-wrapper pull-left _right10">
		<div class="media-box">
		<!-- <div class="vid-wrapper"> -->
			<iframe src="//www.youtube.com/embed/
			{{{ substr($dev->video, stripos($dev->video, 'v=')+2, strlen($dev->video)) }}}" 
			frameborder="0" allowfullscreen></iframe>
		<!-- </div> -->
		</div>
	</div>
	@endif

	{{ $dev->about }}

</div>


<div class="_w100">
	<h3 class="stories">Stories By {{{ $dev->first_name }}}</h3>
	<?php $stories = Story::where('creator', $dev->id)->get() ?>
	@if ($stories->count())
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th width="80%">Title</th>
					<th>Location</th>
				</tr>
			</thead>

			<tbody>
				@foreach ($stories as $story)
					<tr>
						<td>{{ link_to_route('stories.show', $story->name, array($story->id)) }}</td>
						<td>{{{ $story->location }}}</td>
						
	                    <td>{{ All::getEditLink($story, 'stories') }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
		{{{ $dev->first_name }}} has not written any stories. :(
	@endif
</div>


<span class="pull-right">
	{{--! Request::path() --}}
	@if(Request::path() == 'devs/'.Sentry::getUser()->id)
		{{ link_to_route('change-email', 'Change Email', null, array('class' => 'btn btn-primary')) }}
		{{ link_to_route('change-password', 'Change Password', null, array('class' => 'btn btn-primary')) }}
		{{ link_to_route('logout', 'Logout', null, array('class' => 'btn btn-primary')) }}		
	@endif
</span>

{{ link_to_route('devs.index', 'View all Devs', null, array('class' => 'pull-left btn btn-link')) }}

@endif

@stop

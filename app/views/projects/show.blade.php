@extends('layouts.scaffold')
<?php $title = All::getName($project) ?>
<?php $og_image = All::getImage($project) ?>

@section('main')

<div class="_w100 _in-block">
	<h1 class="pull-left">{{{ $project->name }}}</h1>
	<span class="pull-right">
		{{ All::getPublicity($project) }} {{ All::getEditLink($project) }}
	</span>
	
</div>
<div id="single-map"></div>

{{ All::getImageLink($project, '_profile-pic') }}

<table class="_right10 _in-block">
	<tr>
		<th>Creator: </th>
		<td>{{ All::getCreatorLink($project) }}</td>
	</tr>
</table>

<div class="pull-right">
	<table class="_right10 _in-block">
		<tr>
			<th>Type: </th>
			<td>{{{ $project->type }}}</td>
		</tr>
	</table>

	<table class="_right10 _in-block">
		<tr>
			<th>Location: </th>
			<td>{{ All::getLocation($project) }}</td>
		</tr>
	</table>

<!-- 	<table class="_stats _right10 _in-block">
		<tr>
			<th>Views: </th>
			<td rowspan="2">{{{ $project->views }}}</td>
		</tr>
	</table>

	<table class="_stats _right10 _in-block">
		<tr>
			<th>Votes: </th>
			<td>{{{ $project->votes }}}</td>
			<td>Up-Dw</td>
		</tr>
	</table> -->
</div>

<div class="_alerts">
	<div class="_alert _data"><span class="_dismiss pull-right"></span></div>
	<div class="_alert _bg-pink"><span class="_dismiss pull-right"></span></div>
</div>

<p class="_layer _center _f30">{{ All::getTagline($project) }}</p>



<h4>About {{{ $project->name }}}:</h4>
<div class="_about">
	@if(filter_var($project->video, FILTER_VALIDATE_URL))
<!-- height="315" -->
	<div class="vid-wrapper pull-left _right10">
		<div class="media-box">
		<!-- <div class="vid-wrapper"> -->
			<iframe src="//www.youtube.com/embed/
			{{{ substr($project->video, stripos($project->video, 'v=')+2, strlen($project->video)) }}}" 
			frameborder="0" allowfullscreen></iframe>
		<!-- </div> -->
		</div>
	</div>
	@endif

{{ All::getContent($project) }}

</div>

<h2 class="_layer">Contacts</h2>
<div class="_layer">{{ $project->contacts }}</div>

@include('partials.comments')
@include('partials.links')

@stop

@extends('layouts.scaffold')
<?php $title = All::getName($story) ?>
<?php $og_image = All::getImage($story) ?>

@section('main')

<div class="_w100 _in-block">
	<h1 class="pull-left">{{{ $story->name }}}</h1>
	<span class="pull-right">
	{{ All::getPublicity($story) }} {{ All::getEditLink($story) }}
	</span>
	
</div>
<div id="single-map"></div>
{{ All::getImageLink($story, '_profile-pic') }}

<table class="_right10 _in-block">
	<tr>
		<th>Author: </th>
		<td>{{ All::getCreatorLink($story) }}</td>
	</tr>
</table>

<div class="pull-right">

	<table class="_right10 _in-block">
		<tr>
			<th>Location: </th>
			<td>{{ All::getLocation($story) }}</td>
		</tr>
	</table>

<!-- 	<table class="_stats _right10 _in-block">
		<tr>
			<th>Views: </th>
			<td rowspan="2">{{{ $story->views }}}</td>
		</tr>
	</table>

	<table class="_stats _right10 _in-block">
		<tr>
			<th>Votes: </th>
			<td>{{{ $story->votes }}}</td>
			<td>Up-Dw</td>
		</tr>
	</table> -->
</div>

<div class="_alerts">
	<div class="_alert _data"><span class="_dismiss pull-right"></span></div>
	<div class="_alert _bg-pink"><span class="_dismiss pull-right"></span></div>
</div>

<div class="_w100 _p10">{{ All::getContent($story) }}</div>

@include('partials.comments')
@include('partials.links')

@stop

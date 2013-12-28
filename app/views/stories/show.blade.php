@extends('layouts.scaffold')

@section('main')

<div class="_w100 _in-block">
	<h1 class="pull-left">{{{ $story->name }}}</h1>
	<span class="pull-right">
	{{ User::getPublicity($story) }} {{ User::getEditLink($story) }}
	</span>
	
</div>
<div id="single-map"></div>

{{ User::getImageLink($story, '_profile-pic') }}

<table class="_right10 _in-block">
	<tr>
		<th>Author: </th>
		<td>{{ User::find($story->creator)->getNameLink() }}</td>
	</tr>
</table>

<div class="pull-right">

	<table class="_right10 _in-block">
		<tr>
			<th>Location: </th>
			<td>{{{ $story->location }}}</td>
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
<div class="_w100 _p10">{{ $story->body }}</div>

{{ link_to_route('stories.index', 'View all Stories', null, array('class' => 'pull-left btn btn-link')) }}

@stop

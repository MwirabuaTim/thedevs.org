@extends('layouts.scaffold')
<?php $title = All::getName($eventt) ?>
<?php $og_image = All::getImage($eventt) ?>

@section('main')


<div class="_w100 _in-block">
	<h1 class="pull-left">{{{ $eventt->name }}}</h1>
	<span class="pull-right">
		{{ All::getPublicity($eventt) }} {{ All::getEditLink($eventt) }}
	</span>
	
</div>

<div id="single-map"></div>

{{ All::getImageLink($eventt, '_profile-pic') }}

<div class="">
	<table class="_in-block _right10">
		<tr>
			<th>Organiser: </th>
			<td>{{ All::getCreatorLink($eventt) }}</td>
		</tr>
	</table>
	<table class="_in-block _right10">
		<tr>
			<th>Event Type: </th>
			<td>{{{ $eventt->type }}}</td>
		</tr>
	</table>
	<table class="_in-block _right10">
		<tr>
			<th>Venue: </th>
			<td>{{ All::getLocation($eventt) }}</td>
		</tr>
	</table>
</div>
<div class="_in-block">
	<table class="_in-block _right10">
		<tr>
			<th>Start: </th>
			<td>{{{ $eventt->start_time }}}</td>
		</tr>
		<tr>
			<th>End: </th>
			<td>{{{ $eventt->end_time }}}</td>
		</tr>
	</table>
<!-- 	<table class="_stats _right10">
		<tr>
			<th>Votes: </th>
			<td>{{{ $eventt->votes }}}</td>
			<td>Up-Dw</td>
		</tr>
		<tr>
			<th>Views: </th>
			<td rowspan="2">{{{ $eventt->views }}}</td>
		</tr>
	</table> -->
<!-- 	<table class="_in-block _right10">
		<tr>
			<th>Tickets: </th>
			<td>Order</td>
		</tr>
		<tr>
			<th>Remaining: </th>
			<td>200</td>
		</tr>
	</table> -->
</div>

<div class="_alerts">
	<div class="_alert _data"><span class="_dismiss pull-right"></span></div>
	<!-- <div class="_alert _bg-pink"><span class="_dismiss pull-right"></span></div> -->
</div>

<div class="_w100 _p10">{{ All::getContent($eventt) }}</div>

@include('partials.comments')
@include('partials.links')

@stop

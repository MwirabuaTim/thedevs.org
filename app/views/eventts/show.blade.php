@extends('layouts.scaffold')

@section('main')


<div class="_w100 _in-block">
	<h1 class="pull-left">{{{ $eventt->name }}}</h1>
	<span class="pull-right">
		{{ User::getPublicity($eventt) }} {{ User::getEditLink($eventt) }}
	</span>
	
</div>

<div id="single-map"></div>

{{ User::getImageLink($eventt, '_profile-pic') }}



<div class="">
	<table class="_in-block _right10">
		<tr>
			<th>Organiser: </th>
			<td>{{ User::find($eventt->organizer)->getNameLink() }}</td>
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
			<td>{{{ $eventt->location }}}</td>
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
	<table class="_in-block _right10">
		<tr>
			<th>Tickets: </th>
			<td>Order</td>
		</tr>
		<tr>
			<th>Remaining: </th>
			<td>200</td>
		</tr>
	</table>
</div>

<div class="_w100 _p10">{{ $eventt->description }}</div>

{{ link_to_route('eventts.index', 'View all Events', null, array('class' => 'pull-left btn btn-link')) }}

@stop

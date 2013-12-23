@extends('layouts.scaffold')

@section('main')
<h1>{{{ $eventt->name }}}</h1>
<div id="showmap"></div>
<div class="_in-blocks">
	<table class="_block pull-left _right10">
		<tr>
			<th>Type: </th>
			<td>{{{ $eventt->type }}}</td>
		</tr>
	</table>
	<table class="_block pull-left _right10">
		<tr>
			<th>Venue: </th>
			<td>{{{ $eventt->location }}}</td>
		</tr>
	</table>
	<table class="_block pull-left _right10">
		<tr>
			<th>Organiser: </th>
			<td>{{{ $eventt->creator }}}</td>
		</tr>
	</table>
	</table>
</div>
<div class="_in-blocks">
	<div class="_pic"></div>
	<table class="_time _block pull-left _right10">
		<tr>
			<th>Start: </th>
			<td>{{{ $eventt->start_time }}}</td>
		</tr>
		<tr>
			<th>End: </th>
			<td>{{{ $eventt->end_time }}}</td>
		</tr>
	</table>
	<table class="_stats _block pull-left _right10">
		<tr>
			<th>Votes: </th>
			<td>{{{ $eventt->votes }}}</td>
			<td>Up-Dw</td>
		</tr>
		<tr>
			<th>Views: </th>
			<td rowspan="2">{{{ $eventt->views }}}</td>
		</tr>
	</table>
	<table class="_time _block pull-left _right10">
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

<div class="_data">{{ $eventt->description }}</div>


<p>{{ link_to_route('eventts.index', 'Return to all eventts') }}</p>
@stop

@extends('layouts.scaffold')

@section('main')
<div class="_content">
<h1>{{{ $eventt->name }}}</h1>

<p>{{ link_to_route('eventts.index', 'Return to all eventts') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Pic</th>
			<th>Video</th>
			<th>Creator</th>
			<th>Elevator</th>
			<th>Description</th>
			<th>Type</th>
			<th>Location</th>
			<th>Event_image</th>
			<th>Time_start</th>
			<th>Time_end</th>
			<th>Time_zone</th>
			<th>Recurrence_period</th>
			<th>Recurrence_count</th>
			<th>Views</th>
			<th>Votes</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $eventt->pic }}}</td>
			<td>{{{ $eventt->video }}}</td>
			<td>{{{ $eventt->creator }}}</td>
			<td>{{{ $eventt->elevator }}}</td>
			<td>{{{ $eventt->description }}}</td>
			<td>{{{ $eventt->type }}}</td>
			<td>{{{ $eventt->location }}}</td>
			<td>{{{ $eventt->event_image }}}</td>
			<td>{{{ $eventt->time_start }}}</td>
			<td>{{{ $eventt->time_end }}}</td>
			<td>{{{ $eventt->time_zone }}}</td>
			<td>{{{ $eventt->recurrence_period }}}</td>
			<td>{{{ $eventt->recurrence_count }}}</td>
			<td>{{{ $eventt->views }}}</td>
			<td>{{{ $eventt->votes }}}</td>
		</tr>
	</tbody>
</table>
</div>
@stop

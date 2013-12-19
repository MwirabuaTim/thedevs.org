@extends('layouts.sub1')

@section('content')

<h1>All Events</h1>

<!-- <p>{{ link_to_route('eventts.create', 'Add new eventt') }}</p> -->

@if ($eventts->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Pic</th>
				<th>Video</th>
				<th>Creator</th>
				<th>Elevator</th>
				<th>Description</th>
				<th>Type</th>
				<th>Location</th>
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
			@foreach ($eventts as $eventt)
				<tr>
					<td><a href="{{ URL::to('eventts/'.$eventt->id) }}">{{{ $eventt->name }}}</a></td>
					<td>{{{ $eventt->pic }}}</td>
					<td>{{{ $eventt->video }}}</td>
					<td>{{{ $eventt->creator }}}</td>
					<td>{{{ $eventt->elevator }}}</td>
					<td>{{{ $eventt->description }}}</td>
					<td>{{{ $eventt->type }}}</td>
					<td>{{{ $eventt->location }}}</td>
					<td>{{{ $eventt->time_start }}}</td>
					<td>{{{ $eventt->time_end }}}</td>
					<td>{{{ $eventt->time_zone }}}</td>
					<td>{{{ $eventt->recurrence_period }}}</td>
					<td>{{{ $eventt->recurrence_count }}}</td>
					<td>{{{ $eventt->views }}}</td>
					<td>{{{ $eventt->votes }}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no eventts
@endif

@stop
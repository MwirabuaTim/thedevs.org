@extends('layouts.scaffold')

@section('main')

<h1>All Eventts</h1>

<p>{{ link_to_route('eventts.create', 'Add new eventt') }}</p>

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
				<th>Map</th>
				<th>Event_image</th>
				<th>Time_start</th>
				<th>Time_end</th>
				<th>Time_zone</th>
				<th>Recurrence_period</th>
				<th>Recurrence_count</th>
				<th>Views</th>
				<th>Votes</th>
				<th>Notes</th>
				<th>Status</th>
				<th>Public</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($eventts as $eventt)
				<tr>
					<td>{{{ $eventt->name }}}</td>
					<td>{{{ $eventt->pic }}}</td>
					<td>{{{ $eventt->video }}}</td>
					<td>{{{ $eventt->creator }}}</td>
					<td>{{{ $eventt->elevator }}}</td>
					<td>{{{ $eventt->description }}}</td>
					<td>{{{ $eventt->type }}}</td>
					<td>{{{ $eventt->location }}}</td>
					<td>{{{ $eventt->map }}}</td>
					<td>{{{ $eventt->event_image }}}</td>
					<td>{{{ $eventt->time_start }}}</td>
					<td>{{{ $eventt->time_end }}}</td>
					<td>{{{ $eventt->time_zone }}}</td>
					<td>{{{ $eventt->recurrence_period }}}</td>
					<td>{{{ $eventt->recurrence_count }}}</td>
					<td>{{{ $eventt->views }}}</td>
					<td>{{{ $eventt->votes }}}</td>
					<td>{{{ $eventt->notes }}}</td>
					<td>{{{ $eventt->status }}}</td>
					<td>{{{ $eventt->public }}}</td>
                    <td>{{ link_to_route('eventts.edit', 'Edit', array($eventt->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('eventts.destroy', $eventt->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no eventts
@endif

@stop

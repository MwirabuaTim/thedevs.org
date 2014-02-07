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
				<th>Organizer</th>
				<th>Elevator</th>
				<th>Description</th>
				<th>Type</th>
				<th>Location</th>
				<th>Start_time</th>
				<th>End_time</th>
				<th>Time_zone</th>
				<th>Recurrence_period</th>
				<th>Recurrence_count</th>
				<th>Public</th>
				<th>Notes</th>
				<th>Views</th>
				<th>Votes</th>
				<th>Status</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($eventts as $eventt)
				<tr>
					<td>{{{ $eventt->name }}}</td>
					<td>{{{ $eventt->pic }}}</td>
					<td>{{{ $eventt->organizer }}}</td>
					<td>{{{ $eventt->elevator }}}</td>
					<td>{{{ $eventt->description }}}</td>
					<td>{{{ $eventt->type }}}</td>
					<td>{{{ $eventt->location }}}</td>
					<td>{{{ $eventt->start_time }}}</td>
					<td>{{{ $eventt->end_time }}}</td>
					<td>{{{ $eventt->time_zone }}}</td>
					<td>{{{ $eventt->recurrence_period }}}</td>
					<td>{{{ $eventt->recurrence_count }}}</td>
					<td>{{{ $eventt->public }}}</td>
					<td>{{{ $eventt->notes }}}</td>
					<td>{{{ $eventt->views }}}</td>
					<td>{{{ $eventt->votes }}}</td>
					<td>{{{ $eventt->status }}}</td>
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

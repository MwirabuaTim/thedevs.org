@extends('layouts.scaffold')

@section('main')

<h1>All Devs</h1>

<p>{{ link_to_route('devs.create', 'Add new dev') }}</p>

@if ($devs->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Pic</th>
				<th>Video</th>
				<th>Email</th>
				<th>Pass</th>
				<th>Phone</th>
				<th>Elevator</th>
				<th>About</th>
				<th>Location</th>
				<th>Map</th>
				<th>Last_map</th>
				<th>Views</th>
				<th>Votes</th>
				<th>Notes</th>
				<th>Status</th>
				<th>Public</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($devs as $dev)
				<tr>
					<td>{{{ $dev->name }}}</td>
					<td>{{{ $dev->pic }}}</td>
					<td>{{{ $dev->video }}}</td>
					<td>{{{ $dev->email }}}</td>
					<td>{{{ $dev->pass }}}</td>
					<td>{{{ $dev->phone }}}</td>
					<td>{{{ $dev->elevator }}}</td>
					<td>{{{ $dev->about }}}</td>
					<td>{{{ $dev->location }}}</td>
					<td>{{{ $dev->map }}}</td>
					<td>{{{ $dev->last_map }}}</td>
					<td>{{{ $dev->views }}}</td>
					<td>{{{ $dev->votes }}}</td>
					<td>{{{ $dev->notes }}}</td>
					<td>{{{ $dev->status }}}</td>
					<td>{{{ $dev->public }}}</td>
                    <td>{{ link_to_route('devs.edit', 'Edit', array($dev->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('devs.destroy', $dev->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no devs
@endif

@stop

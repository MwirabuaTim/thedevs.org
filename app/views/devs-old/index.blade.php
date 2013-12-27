@extends('layouts.scaffold')

@section('main')

<h1>All Devs</h1>

<p>{{ link_to_route('devs.create', 'Add new dev') }}</p>

@if ($devs->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>First_name</th>
				<th>Last_name</th>
				<th>Pic</th>
				<th>Video</th>
				<th>Email</th>
				<th>Password</th>
				<th>Phone</th>
				<th>Elevator</th>
				<th>About</th>
				<th>Location</th>
				<th>Last_map</th>
				<th>Public</th>
				<th>Notes</th>
				<th>Views</th>
				<th>Votes</th>
				<th>Status</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($devs as $dev)
				<tr>
					<td>{{{ $dev->first_name }}}</td>
					<td>{{{ $dev->last_name }}}</td>
					<td>{{{ $dev->pic }}}</td>
					<td>{{{ $dev->video }}}</td>
					<td>{{{ $dev->email }}}</td>
					<td>{{{ $dev->password }}}</td>
					<td>{{{ $dev->phone }}}</td>
					<td>{{{ $dev->elevator }}}</td>
					<td>{{{ $dev->about }}}</td>
					<td>{{{ $dev->location }}}</td>
					<td>{{{ $dev->last_map }}}</td>
					<td>{{{ $dev->public }}}</td>
					<td>{{{ $dev->notes }}}</td>
					<td>{{{ $dev->views }}}</td>
					<td>{{{ $dev->votes }}}</td>
					<td>{{{ $dev->status }}}</td>
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

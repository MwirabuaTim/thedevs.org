@extends('layouts.scaffold')

@section('main')

<h1>Show Kit</h1>

<p>{{ link_to_route('kits.index', 'Return to all kits') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>Creator</th>
				<th>About</th>
				<th>Views</th>
				<th>Votes</th>
				<th>Notes</th>
				<th>Status</th>
				<th>Public</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $kit->name }}}</td>
					<td>{{{ $kit->creator }}}</td>
					<td>{{{ $kit->about }}}</td>
					<td>{{{ $kit->views }}}</td>
					<td>{{{ $kit->votes }}}</td>
					<td>{{{ $kit->notes }}}</td>
					<td>{{{ $kit->status }}}</td>
					<td>{{{ $kit->public }}}</td>
                    <td>{{ link_to_route('kits.edit', 'Edit', array($kit->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('kits.destroy', $kit->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop

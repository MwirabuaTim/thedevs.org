@extends('layouts.scaffold')

@section('main')

<h1>All Kits</h1>

<p>{{ link_to_route('kits.create', 'Add new kit') }}</p>

@if ($kits->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Creator</th>
				<th>About</th>
				<th>Public</th>
				<th>Views</th>
				<th>Votes</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($kits as $kit)
				<tr>
					<td>{{{ $kit->name }}}</td>
					<td>{{{ $kit->creator }}}</td>
					<td>{{{ $kit->about }}}</td>
					<td>{{{ $kit->public }}}</td>
					<td>{{{ $kit->views }}}</td>
					<td>{{{ $kit->votes }}}</td>
                    <td>{{ link_to_route('kits.edit', 'Edit', array($kit->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('kits.destroy', $kit->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no kits
@endif

@stop

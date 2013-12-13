@extends('layouts.scaffold')

@section('css')
<link href="css/orgs.css" rel="stylesheet">
@stop

@section('main')

<h1>All Orgs</h1>

<p>{{ link_to_route('orgs.create', 'Add new org') }}</p>

@if ($orgs->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Logo</th>
				<th>Video</th>
				<th>Creator</th>
				<th>Elevator</th>
				<th>Description</th>
				<th>Type</th>
				<th>Contacts</th>
				<th>Forum_id</th>
				<th>Location</th>
				<th>Map</th>
				<th>Views</th>
				<th>Votes</th>
				<th>Notes</th>
				<th>Status</th>
				<th>Public</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($orgs as $org)
				<tr>
					<td>{{{ $org->name }}}</td>
					<td>{{{ $org->logo }}}</td>
					<td>{{{ $org->video }}}</td>
					<td>{{{ $org->creator }}}</td>
					<td>{{{ $org->elevator }}}</td>
					<td>{{{ $org->description }}}</td>
					<td>{{{ $org->type }}}</td>
					<td>{{{ $org->contacts }}}</td>
					<td>{{{ $org->forum_id }}}</td>
					<td>{{{ $org->location }}}</td>
					<td>{{{ $org->map }}}</td>
					<td>{{{ $org->views }}}</td>
					<td>{{{ $org->votes }}}</td>
					<td>{{{ $org->notes }}}</td>
					<td>{{{ $org->status }}}</td>
					<td>{{{ $org->public }}}</td>
                    <td>{{ link_to_route('orgs.edit', 'Edit', array($org->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('orgs.destroy', $org->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no orgs
@endif

@stop

@section('js')
<script src="js/orgs.js" type="text/javascript" charset="utf-8" async defer></script>
@stop
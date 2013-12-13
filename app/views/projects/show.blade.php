@extends('layouts.scaffold')

@section('main')

<h1>Show Project</h1>

<p>{{ link_to_route('projects.index', 'Return to all projects') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>Logo</th>
				<th>Video</th>
				<th>Creator</th>
				<th>Elevator</th>
				<th>Link</th>
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
		<tr>
			<td>{{{ $project->name }}}</td>
					<td>{{{ $project->logo }}}</td>
					<td>{{{ $project->video }}}</td>
					<td>{{{ $project->creator }}}</td>
					<td>{{{ $project->elevator }}}</td>
					<td>{{{ $project->link }}}</td>
					<td>{{{ $project->description }}}</td>
					<td>{{{ $project->type }}}</td>
					<td>{{{ $project->contacts }}}</td>
					<td>{{{ $project->forum_id }}}</td>
					<td>{{{ $project->location }}}</td>
					<td>{{{ $project->map }}}</td>
					<td>{{{ $project->views }}}</td>
					<td>{{{ $project->votes }}}</td>
					<td>{{{ $project->notes }}}</td>
					<td>{{{ $project->status }}}</td>
					<td>{{{ $project->public }}}</td>
                    <td>{{ link_to_route('projects.edit', 'Edit', array($project->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('projects.destroy', $project->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop

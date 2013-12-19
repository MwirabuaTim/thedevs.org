@extends('layouts.scaffold')

@section('main')
<div class="_content">
<h1>{{{ $project->name }}}</h1>

<p>{{ link_to_route('projects.index', 'Return to all projects') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Logo</th>
			<th>Video</th>
			<th>Creator</th>
			<th>Elevator</th>
			<th>Link</th>
			<th>Description</th>
			<th>Type</th>
			<th>Contacts</th>
			<th>Location</th>
			<th>Views</th>
			<th>Votes</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $project->logo }}}</td>
			<td>{{{ $project->video }}}</td>
			<td>{{{ $project->creator }}}</td>
			<td>{{{ $project->elevator }}}</td>
			<td>{{{ $project->link }}}</td>
			<td>{{{ $project->description }}}</td>
			<td>{{{ $project->type }}}</td>
			<td>{{{ $project->contacts }}}</td>
			<td>{{{ $project->location }}}</td>
			<td>{{{ $project->views }}}</td>
			<td>{{{ $project->votes }}}</td>
		</tr>
	</tbody>
</table>
</div>
@stop

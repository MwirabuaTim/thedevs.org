@extends('layouts.sub1')

@section('content')

<h1>All Projects</h1>

<!-- <p>{{ link_to_route('projects.create', 'Add new project') }}</p> -->

@if ($projects->count())
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
				<th>Location</th>
				<th>Views</th>
				<th>Votes</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($projects as $project)
				<tr>
					<td><a href="{{ URL::to('projects/'.$project->id) }}">{{{ $project->name }}}</a></td>
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
			@endforeach
		</tbody>
	</table>
@else
	There are no projects
@endif

@stop
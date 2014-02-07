@extends('layouts.scaffold')

@section('transparent')
	@include('partials.mapnav')
@stop

@section('main')

<div class="_addbtn _center _top10 _bottom10">
	<span class="_blade _aqua2pink _step1">+Create</span>
</div>

<h2 class="_inline">Latest Projects...</h2>

<!-- <p class="pull-right _top10">{{ link_to_route('projects.create', 'Add One... :)') }}</p> -->

@if($projects->count())
	{{ $projects->links() }}
	<table class="table table-striped table-bordered _top10">
		<thead>
			<tr>
				<th>Logo</th>
				<th>Name</th>
				<!-- <th>Tagline</th> -->
				<th>Type</th>
				<th>Location</th>
				<!-- <th>Link</th> -->
				<!-- <th>Views</th> -->
				<!-- <th>Votes</th> -->
				<th>Creator</th>
			</tr>
		</thead>

		<tbody>
			@foreach($projects as $project)
				<tr>
					<td rowspan="2">{{ All::getImageLink($project, '_list-img') }}</td>
					<td>{{ All::getNameLink($project) }}</td>
					<!-- <td>{{ All::getTagline($project) }}</td> -->
					<td>{{{ $project->type }}}</td>
					<td>{{ All::getLocation($project) }}</td>
					<!-- <td>{{{ $project->link }}}</td> -->
					<!-- <td>{{{ $project->views }}}</td> -->
					<!-- <td>{{{ $project->votes }}}</td> -->
					<td rowspan="2">{{ All::getCreatorImageLink($project, '_list-img') }}
						<br/>{{ All::getCreatorLink($project) }}</td>
				</tr>
				<tr><td>Tagline: </td><td colspan="2" class="_left">{{ All::getTagline($project) }}</td></tr>
			@endforeach
		</tbody>
	</table>
	{{ $projects->links() }}
@else
	There are no projects
@endif

@stop
@extends('layouts.scaffold')

@section('main')

<h1>{{{ $story->name }}}</h1>

<p>{{ link_to_route('stories.index', 'Return to all stories') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Creator</th>
			<th>Body</th>
			<th>Location</th>
			<th>Views</th>
			<th>Votes</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $story->creator }}}</td>
			<td>{{{ $story->body }}}</td>
			<td>{{{ $story->location }}}</td>
			<td>{{{ $story->views }}}</td>
			<td>{{{ $story->votes }}}</td>
		</tr>
	</tbody>
</table>

@stop

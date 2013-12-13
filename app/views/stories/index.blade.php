@extends('layouts.scaffold')

@section('main')

<h1>All Stories</h1>

<p>{{ link_to_route('stories.create', 'Add new story') }}</p>

@if ($stories->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Creator</th>
				<th>Body</th>
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
			@foreach ($stories as $story)
				<tr>
					<td>{{{ $story->name }}}</td>
					<td>{{{ $story->creator }}}</td>
					<td>{{{ $story->body }}}</td>
					<td>{{{ $story->location }}}</td>
					<td>{{{ $story->map }}}</td>
					<td>{{{ $story->views }}}</td>
					<td>{{{ $story->votes }}}</td>
					<td>{{{ $story->notes }}}</td>
					<td>{{{ $story->status }}}</td>
					<td>{{{ $story->public }}}</td>
                    <td>{{ link_to_route('stories.edit', 'Edit', array($story->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('stories.destroy', $story->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no stories
@endif

@stop

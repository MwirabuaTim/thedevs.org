@extends('layouts.scaffold')

@section('transparent')
	@include('partials.mapnav')
@stop

@section('main')


<h1>All Stories</h1>

<!-- <p>{{ link_to_route('stories.create', 'Add new story') }}</p> -->

@if ($stories->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Title</th>
				<!-- <th>Body</th> -->
				<th>Location</th>
				<!-- <th>Views</th> -->
				<!-- <th>Votes</th> -->
				<th>Creator</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($stories as $story)
				<tr>
					<td>{{ All::getNameLink($story) }}</td>
					<!-- <td>{{{ $story->body }}}</td> -->
					<td>{{{ $story->location }}}</td>
					<!-- <td>{{{ $story->views }}}</td> -->
					<!-- <td>{{{ $story->votes }}}</td> -->
					<td>{{ All::getCreatorImageLink($story, '_list-img') }}
						<br/>{{ All::getCreatorLink($story) }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no stories
@endif

@stop
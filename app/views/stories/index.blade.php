@extends('layouts.scaffold')

@section('transparent')
	@include('partials.mapnav')
@stop

@section('main')

<div class="_addbtn _center _top10 _bottom10">
	<span class="_blade _aqua2pink _step1">+Create</span>
</div>

<h2 class="_inline">Latest Stories...</h2>

<!-- <p class="pull-right _top10">{{ link_to_route('stories.create', 'Add One... :)') }}</p> -->

@if($stories->count())
	{{ $stories->links() }}
	<table class="table table-striped table-bordered _top10">
		<thead>
			<tr>
				<th>Title</th>
				<th>Location</th>
				<!-- <th>Views</th> -->
				<!-- <th>Votes</th> -->
				<th>Creator</th>
			</tr>
		</thead>

		<tbody>
			@foreach($stories as $story)
				<tr>
					<td>{{ All::getNameLink($story) }}</td>
					<td>{{ All::getLocation($story) }}</td>
					<!-- <td>{{{ $story->views }}}</td> -->
					<!-- <td>{{{ $story->votes }}}</td> -->
					<td>{{ All::getCreatorImageLink($story, '_list-img') }}
						<br/>{{ All::getCreatorLink($story) }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $stories->links() }}
@else
	There are no stories
@endif

@stop
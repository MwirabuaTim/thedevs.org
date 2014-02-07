@extends('layouts.scaffold')

@section('transparent')
	@include('partials.mapnav')
@stop

@section('main')

<div class="_addbtn _center _top10 _bottom10">
	<span class="_blade _aqua2pink _step1">+Create</span>
</div>

<h2 class="_inline">Latest Events...</h2>

<!-- <p class="pull-right _top10">{{ link_to_route('eventts.create', 'Add One... :)') }}</p> -->

@if($eventts->count())
	{{ $eventts->links() }}
	<table class="table table-striped table-bordered _top10">
		<thead>
			<tr>
				<th>Title</th>
				<!-- <th>Tagline</th> -->
				<th>Type</th>
				<th>Location</th>
				<th>Time</th>
				<!-- <th>Time_end</th> -->
				<!-- <th>Views</th> -->
				<!-- <th>Votes</th> -->
				<th>Creator</th>
			</tr>
		</thead>

		<tbody>
			@foreach($eventts as $eventt)
				<tr>
					<td>{{ All::getNameLink($eventt) }}</td>
					<!-- <td>{{ All::getTagline($eventt) }}</td> -->
					<td>{{{ $eventt->type }}}</td>
					<td>{{ All::getLocation($eventt) }}</td>
					<td>{{{ $eventt->start_time }}}</br>{{{ $eventt->end_time }}}</td>
					<!-- <td>{{{ $eventt->end_time }}}</td> -->
					<!-- <td>{{{ $eventt->views }}}</td> -->
					<!-- <td>{{{ $eventt->votes }}}</td> -->
					<td>{{ All::getCreatorImageLink($eventt, '_list-img') }}
						<br/>{{ All::getCreatorLink($eventt) }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $eventts->links() }}
@else
	There are no eventts
@endif

@stop
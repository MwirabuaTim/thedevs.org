@extends('layouts.scaffold')

@section('transparent')
	@include('partials.mapnav')
@stop

@section('main')

<h1>All Events</h1>

<!-- <p>{{ link_to_route('eventts.create', 'Add new eventt') }}</p> -->

@if ($eventts->count())
	<table class="table table-striped table-bordered">
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
			@foreach ($eventts as $eventt)
				<tr>
					<td>{{ All::getNameLink($eventt) }}</td>
					<!-- <td>{{{ $eventt->elevator }}}</td> -->
					<td>{{{ $eventt->type }}}</td>
					<td>{{{ $eventt->location }}}</td>
					<td>{{{ $eventt->start_time }}}</br>{{{ $eventt->end_time }}}</td>
					<!-- <td>{{{ $eventt->end_time }}}</td> -->
					<!-- <td>{{{ $eventt->views }}}</td> -->
					<!-- <td>{{{ $eventt->votes }}}</td> -->
					<td>{{ All::getCreatorImageLink($eventt, '_list-img') }}}
						<br/>{{ All::getCreatorLink($eventt) }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no eventts
@endif

@stop
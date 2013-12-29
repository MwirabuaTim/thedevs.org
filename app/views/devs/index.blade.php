@extends('layouts.scaffold')

@section('transparent')
	@include('partials.mapnav')
@stop

@section('main')

<h2 class="_inline">Latest Devs...</h2>

<p class="pull-right _top10">{{ link_to_route('devs.create', 'Add Someone... :)') }}</p>

@if ($devs->count())
	<table class="table table-striped table-bordered _top10">
		<thead>
			<tr>
				<th>Picture</th>
				<th>Name</th>
				<th>Tagline</th>
				<th>Location</th>
				<!-- <th>Views</th> -->
				<!-- <th>Votes</th> -->
			</tr>
		</thead>

		<tbody>
			@foreach ($devs as $dev)
				<tr>
					<td>{{ All::getImageLink($dev, '_list-img') }}</td>
					<td>{{ All::getNameLink($dev) }}</td>
					<td>{{{ $dev->elevator }}}</td>
					<td>{{{ $dev->location }}}</td>
					<!-- <td>{{{ $dev->views }}}</td> -->
					<!-- <td>{{{ $dev->votes }}}</td> -->
				</tr>
			@endforeach
		</tbody>
	</table>

@endif

@stop

@extends('layouts.sub1')

@section('content')

<h1>All Devs</h1>

	@if ($devs->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Pic</th>
				<th>Video</th>
				<!-- <th>Email</th> -->
				<!-- <th>Phone</th> -->
				<th>Elevator</th>
				<th>About</th>
				<th>Location</th>
				<!-- <th>Views</th> -->
				<!-- <th>Votes</th> -->
			</tr>
		</thead>

		<tbody>
			@foreach ($devs as $dev)
				<tr>
					<td><a href="{{ URL::to('devs/'.$dev->id) }}">{{{ $dev->first_name }}}&nbsp;{{{ $dev->last_name }}}</a></td>
					<td><img src="{{{ $dev->pic }}}" /></td>
					<td>{{{ $dev->video }}}</td>
					<!-- <td>{{{ $dev->email }}}</td> -->
					<!-- <td>{{{ $dev->phone }}}</td> -->
					<td>{{{ $dev->elevator }}}</td>
					<td>{{{ $dev->about }}}</td>
					<td>{{{ $dev->location }}}</td>
					<!-- <td>{{{ $dev->views }}}</td> -->
					<!-- <td>{{{ $dev->votes }}}</td> -->
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no devs
@endif

@stop

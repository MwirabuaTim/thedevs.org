@extends('layouts.sub1')

@section('content')

<h1>Devs</h1>

@if ($devs->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Pic</th>
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
					<td><img src="{{{ $dev->pic }}}" style="max-width: 100px;" /></td>
					<td><a href="{{ URL::to('devs/'.$dev->id) }}">{{{ $dev->first_name }}}&nbsp;{{{ $dev->last_name }}}</a></td>
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

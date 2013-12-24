@extends('layouts.scaffold')

@section('transparent')
	@include('partials.mapnav')
@stop

@section('main')

<h1>All Orgs</h1>
<!-- <p>{{ link_to_route('orgs.create', 'Add new org') }}</p> -->

@if ($orgs->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Logo</th>
				<th>Name</th>
				<th>Tagline</th>
				<th>Type</th>
				<th>Location</th>
				<th>Creator</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($orgs as $org)
				<tr>
					<td>{{{ $org->logo }}}</td>
					<td><a href="{{ URL::to('orgs/'.$org->id) }}">{{{ $org->name }}}</a></td>
					<td>{{{ $org->elevator }}}</td>
					<td>{{{ $org->type }}}</td>
					<td>{{{ $org->location }}}</td>
					<td>{{{ $org->creator }}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no orgs
@endif

@stop

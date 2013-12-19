@extends('layouts.sub1')

@section('content')

<h1>All Orgs</h1>
<!-- <p>{{ link_to_route('orgs.create', 'Add new org') }}</p> -->

@if ($orgs->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Logo</th>
				<th>Video</th>
				<th>Creator</th>
				<th>Elevator</th>
				<th>Description</th>
				<th>Type</th>
				<th>Contacts</th>
				<th>Location</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($orgs as $org)
				<tr>
					<td><a href="{{ URL::to('orgs/'.$org->id) }}">{{{ $org->name }}}</a></td>
					<td>{{{ $org->logo }}}</td>
					<td>{{{ $org->video }}}</td>
					<td>{{{ $org->creator }}}</td>
					<td>{{{ $org->elevator }}}</td>
					<td>{{{ $org->description }}}</td>
					<td>{{{ $org->type }}}</td>
					<td>{{{ $org->contacts }}}</td>
					<td>{{{ $org->location }}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no orgs
@endif

@stop

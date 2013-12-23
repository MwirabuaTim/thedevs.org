@extends('layouts.scaffold')

@section('main')

<h1>{{{ $org->name }}}</h1>

<p>{{ link_to_route('orgs.index', 'Return to all orgs') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Logo</th>
			<th>Video</th>
			<th>Creator</th>
			<th>Tagline</th>
			<th>Description</th>
			<th>Type</th>
			<th>Contacts</th>
			<th>Location</th>
			<th>Views</th>
			<th>Votes</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $org->logo }}}</td>
			<td>{{{ $org->video }}}</td>
			<td>{{{ $org->creator }}}</td>
			<td>{{{ $org->elevator }}}</td>
			<td>{{{ $org->description }}}</td>
			<td>{{{ $org->type }}}</td>
			<td>{{{ $org->contacts }}}</td>
			<td>{{{ $org->location }}}</td>
			<td>{{{ $org->views }}}</td>
			<td>{{{ $org->votes }}}</td>
		</tr>
	</tbody>
</table>

@stop

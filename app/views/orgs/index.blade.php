@extends('layouts.scaffold')

@section('transparent')
	@include('partials.mapnav')
@stop

@section('main')

<h2 class="_inline">Latest Orgs...</h2>

<!-- <p class="pull-right _top10">{{ link_to_route('orgs.create', 'Add One... :)') }}</p> -->

@if ($orgs->count())
	<table class="table table-striped table-bordered _top10">
		<thead>
			<tr>
				<th>Logo</th>
				<th>Name</th>
				<!-- <th>Tagline</th> -->
				<th>Type</th>
				<th>Location</th>
				<th>Creator</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($orgs as $org)
				<tr>
					<td>{{ All::getImageLink($org, '_list-img') }}</td>
					<td>{{ All::getNameLink($org) }}</td>
					<!-- <td>{{{ $org->elevator }}}</td> -->
					<td>{{{ $org->type }}}</td>
					<td>{{{ $org->location }}}</td>
					<td>{{ All::getCreatorImageLink($org, '_list-img') }}
						<br/>{{ All::getCreatorLink($org) }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no orgs
@endif

@stop
